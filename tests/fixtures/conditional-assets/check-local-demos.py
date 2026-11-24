import json,urllib.request,re,concurrent.futures,sys
from html.parser import HTMLParser
class Assets(HTMLParser):
 def __init__(self):super().__init__();self.urls=[]
 def handle_starttag(self,tag,attrs):
  a=dict(attrs)
  if tag=="script" and a.get("src"):self.urls.append(a["src"])
  if tag=="link" and a.get("rel")=="stylesheet" and a.get("href"):self.urls.append(a["href"])
from pathlib import Path
base=Path(sys.argv[1])
pages=json.loads((base/'demo-pages.json').read_text())['pages']
def run(item):
 slug,data=item; results={}
 for mode in ['split','complete']:
  url=data['url']+'?phase5=matrix'+('&complete=1' if mode=='complete' else '')
  with urllib.request.urlopen(url,timeout=45) as r:html=r.read().decode();status=r.status
  parser=Assets();parser.feed(html);assets=parser.urls
  theme=[a.replace('&amp;','&') for a in assets if 'flexline-phase5-source/flexline/' in a]
  results[mode]={'status':status,'url':url,'theme_assets':theme,'duplicates':len(theme)-len(set(theme)),'fatal':'Fatal error' in html,'has_slider':'is-style-slider' in html,'has_scroller':'is-style-horizontal-scroll' in html}
  (base/(slug.split('/')[-1]+'-'+mode+'.html')).write_text(html)
 return slug,results
with concurrent.futures.ThreadPoolExecutor(max_workers=3) as pool: result=dict(pool.map(run,pages.items()))
(base/'demo-http-matrix.json').write_text(json.dumps(result,indent=2))
print(json.dumps({k:{m:{q:v for q,v in d.items() if q not in ['url','theme_assets']} for m,d in modes.items()} for k,modes in result.items()},indent=2))
