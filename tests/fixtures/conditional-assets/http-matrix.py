import sys,urllib.request,re,json,hashlib
from pathlib import Path
root=Path(sys.argv[1]).resolve()
report={}
for page in ['plain','slider','scroll','both','locations','floorplans']:
 for mode in ['split','complete']:
  url='http://127.0.0.1:8795/phase5-'+page+'/'+('?complete=1' if mode=='complete' else '')
  with urllib.request.urlopen(url) as r: html=r.read().decode()
  refs=re.findall(r'<(?:link|script)\b[^>]*(?:href|src)=[\'\"]([^\'\"]+)[\'\"][^>]*>',html)
  urls=list(dict.fromkeys(u.replace('&#038;','&') for u in refs if '/themes/flexline/' in u and ('.css' in u or '.js' in u)))
  assets=[]
  for u in urls:
   with urllib.request.urlopen(urllib.request.Request(u,headers={'Accept-Encoding':'identity'})) as r: data=r.read();assets.append({'url':u,'bytes':len(data),'encoding':r.headers.get('Content-Encoding','identity')})
  report[page+'-'+mode]={'url':url,'assets':assets,'requests':len(assets),'bytes':sum(a['bytes'] for a in assets)}
(root/'http-matrix.json').write_text(json.dumps(report,indent=2))
print(json.dumps({k:{'requests':v['requests'],'bytes':v['bytes'],'features':[a['url'].split('/')[-1].split('?')[0] for a in v['assets'] if 'component-' in a['url'] or any(t in a['url'] for t in ['slider.js','horizontal-scroll.js'])]} for k,v in report.items()},indent=2))
