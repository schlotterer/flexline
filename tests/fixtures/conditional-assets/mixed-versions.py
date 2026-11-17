import sys,time,subprocess,urllib.request,json,re,hashlib
from pathlib import Path
p=Path(sys.argv[1]).resolve();container='phase5-conditional-wp'
def replace(folder,name,prior):
 subprocess.run(['docker','exec',container,'rm','-rf','/var/www/html/wp-content/'+folder+'/'+name],check=True)
 subprocess.run(['docker','cp',str(p/('prior-staging' if prior else 'staging')/name),container+':/var/www/html/wp-content/'+folder+'/'],check=True)
def probe(label,metadata):
 # ZIP replacement bypasses WP Upgrader: explicitly flush PHP opcache between versions.
 subprocess.run(["docker","restart",container],check=True,stdout=subprocess.DEVNULL)
 for attempt in range(10):
  try:
   urllib.request.urlopen("http://127.0.0.1:8795/",timeout=5).close();break
  except OSError:time.sleep(0.5)
 body=json.dumps({'ids':[4,6],'view':'grid','pattern':'phase5/location-card'}).encode()
 req=urllib.request.Request('http://127.0.0.1:8795/wp-json/web4sl-location-sync/v1/location-cards',data=body,headers={'Content-Type':'application/json'})
 with urllib.request.urlopen(req) as r:payload=json.load(r)
 assert ('assets' in payload)==metadata,(label,payload.keys())
 assert 'Phase 5 Cedar' in payload['html'] and 'is-style-slider' in payload['html']
 pages={}
 for slug in ['locations','floorplans']:
  with urllib.request.urlopen('http://127.0.0.1:8795/phase5-'+slug+'/') as r:html=r.read().decode()
  assert ('Plan Cedar' if slug=='floorplans' else 'Phase 5 Cedar') in html
  pages[slug]={'slider_runtime':'/slider.js?' in html,'scroll_runtime':'/horizontal-scroll.js?' in html}
 checksum=subprocess.check_output(['docker','exec',container,'php','/tmp/phase5-snapshot.php'],text=True).strip()
 return {'metadata':metadata,'rendered':payload.get('rendered'),'html_sha256':hashlib.sha256(payload['html'].encode()).hexdigest(),'pages':pages,'content_sha256':checksum}
replace("themes","flexline",True)
results={}
results['released-theme-candidate-plugins']=probe('released-theme-candidate-plugins',False)
replace('themes','flexline',False)
for name in ['web4sl-location-sync','web4sl-advanced-floor-plans']:replace('plugins',name,True)
results['candidate-theme-released-plugins']=probe('candidate-theme-released-plugins',False)
replace('themes','flexline',True)
results['released-theme-released-plugins']=probe('released-theme-released-plugins',False)
for name in ['web4sl-location-sync','web4sl-advanced-floor-plans']:replace('plugins',name,False)
replace('themes','flexline',False)
results['candidate-theme-candidate-plugins']=probe('candidate-theme-candidate-plugins',True)
assert len({x['content_sha256'] for x in results.values()})==1
(p/'mixed-versions.json').write_text(json.dumps(results,indent=2));print(json.dumps(results,indent=2))
