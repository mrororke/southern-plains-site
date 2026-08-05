import{m as l}from"./module.esm-DdaDH_LP.js";function s(e){return(e||[]).map(r=>({...r,is_preferred:Number(r.is_preferred||0),platform:(r.platform||"unknown").toLowerCase()}))}function d(e){return{youtube:"YouTube",tiktok:"TikTok",instagram:"Instagram",facebook:"Facebook",unknown:"Unknown"}[e]??h(e)}function h(e){return e?e.charAt(0).toUpperCase()+e.slice(1):"Unknown"}function f(e,r){const n=s(r).map(i=>i.url).filter(Boolean).join(`
`);return`We've found these resources to help you teach your dog ${e}:

${n}`}function p(e,r){const n={};s(r).forEach(t=>{if(!t.url)return;const o=t.platform;n[o]||(n[o]=[]),n[o].push(t)});const i=Object.entries(n).map(([t,o])=>{const u=o.map(c=>`${c.creator||"Unknown creator"}
${c.url}`);return`${d(t)}:

${u.join(`

`)}`});return[`We've found these resources to help you teach your dog ${e}:`,"",...i].join(`

`).trim()}function m(e,r){const i=s(r).filter(t=>t.is_preferred===1).filter(t=>t.url).map(t=>`${t.creator||"Unknown creator"}
${t.url}`);return[`We've found these preferred resources to help you teach your dog ${e}:`,"",i.join(`

`)].join(`
`).trim()}async function a(e){if(!e)return!1;try{return await navigator.clipboard.writeText(e),!0}catch(r){return console.error("Unable to copy behavior email.",r),!1}}window.Alpine=l;l.data("behaviorCatalog",()=>({selectedBehavior:null,selectBehavior(e){this.selectedBehavior=e},clearBehavior(){this.selectedBehavior=null},isPreferred(e){return[1,"1",!0,"true"].includes(e==null?void 0:e.is_preferred)},preferredVideo(){var e,r;return((r=(e=this.selectedBehavior)==null?void 0:e.videos)==null?void 0:r.find(n=>this.isPreferred(n)))??null},additionalVideos(){var e,r;return((r=(e=this.selectedBehavior)==null?void 0:e.videos)==null?void 0:r.filter(n=>!this.isPreferred(n)))??[]},platformLabel(e){return e?e.charAt(0).toUpperCase()+e.slice(1):"Unknown platform"},copyVideoUrl(e){e&&navigator.clipboard.writeText(e)},async copySimple(){if(!this.selectedBehavior)return;const e=f(this.selectedBehavior.name,this.selectedBehavior.videos);await a(e)},async copyGrouped(){if(!this.selectedBehavior)return;const e=p(this.selectedBehavior.name,this.selectedBehavior.videos);await a(e)},async copyPreferred(){if(!this.selectedBehavior)return;const e=m(this.selectedBehavior.name,this.selectedBehavior.videos);await a(e)}}));
