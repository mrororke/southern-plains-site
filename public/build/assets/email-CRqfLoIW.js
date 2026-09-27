function u(r){return(r||[]).map(e=>({...e,is_preferred:Number(e.is_preferred||0),platform:(e.platform||"unknown").toLowerCase()}))}function s(r){return{youtube:"YouTube",tiktok:"TikTok",instagram:"Instagram",facebook:"Facebook",unknown:"Unknown"}[r]??l(r)}function l(r){return r?r.charAt(0).toUpperCase()+r.slice(1):"Unknown"}function p(r,e){const o=u(e).map(a=>a.url).filter(Boolean).join(`
`);return`We've found these resources to help you teach your dog ${r}:

${o}`}function m(r,e){const o={};u(e).forEach(n=>{if(!n.url)return;const t=n.platform;o[t]||(o[t]=[]),o[t].push(n)});const a=Object.entries(o).map(([n,t])=>{const i=t.map(c=>`${c.creator||"Unknown creator"}
${c.url}`);return`${s(n)}:

${i.join(`

`)}`});return[`We've found these resources to help you teach your dog ${r}:`,...a].join(`

`).trim()}function d(r,e){const a=u(e).filter(n=>n.is_preferred===1).filter(n=>n.url).map(n=>`${n.creator||"Unknown creator"}
${n.url}`);return[`We've found these preferred resources to help you teach your dog ${r}:`,"",a.join(`

`)].join(`
`).trim()}async function b(r){if(!r)return!1;try{return await navigator.clipboard.writeText(r),!0}catch(e){return console.error("Unable to copy behavior email.",e),!1}}export{m as a,d as b,b as c,p as d};
