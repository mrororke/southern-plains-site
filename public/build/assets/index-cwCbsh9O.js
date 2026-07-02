console.log("EMAIL MODULE LOADED");function s(e){return(e||[]).map(t=>({...t,is_preferred:Number(t.is_preferred||0),platform:(t.platform||"unknown").toLowerCase()}))}function d(e,t){const o=s(t).map(r=>r.url).filter(Boolean).join(`
`);return`We've found these resources to help you teach your dog ${e}:

${o}`}function u(e,t){const o={};s(t).forEach(n=>{if(!n.url)return;const i=m(n.platform);o[i]||(o[i]=[]),o[i].push(n.url)});let r=`We've found these resources to help you teach your dog ${e}:

`;return Object.keys(o).forEach(n=>{r+=`${n}:
`,o[n].forEach(i=>{r+=`${i}
`}),r+=`
`}),r.trim()}function p(e,t){const r=s(t).filter(n=>n.is_preferred===1).map(n=>n.url).filter(Boolean).join(`
`);return`We've found these preferred resources to help you teach your dog ${e}:

${r}`}function f(e,t){navigator.clipboard.writeText(e).then(()=>{const o=t.querySelector(".copy-label");if(o){const r=o.innerText;o.innerText="Copied ✓",t.classList.add("opacity-70"),setTimeout(()=>{o.innerText=r,t.classList.remove("opacity-70")},1500)}}).catch(()=>{const o=t.querySelector(".copy-label");o&&(o.innerText="Failed",setTimeout(()=>{o.innerText="Copy"},1500))})}function m(e){return e?e.charAt(0).toUpperCase()+e.slice(1):"Unknown"}window.TrickCatalogEmail={buildEmailSimple:d,buildEmailGrouped:u,buildEmailPreferredOnly:p,copyEmail:f};function h(e){e||(e="unknown");const t=e.replaceAll("_"," ").replace(/\b\w/g,n=>n.toUpperCase()),o={novice:"bg-gray-500 text-white",intermediate:"bg-blue-500 text-white",advanced:"bg-purple-500 text-white",performer:"bg-pink-500 text-white",performer_elite:"bg-black text-white",unknown:"bg-gray-300 text-black"};return`
        <span class="inline-flex items-center px-2 py-1 text-xs font-semibold ${o[e]??o.unknown}">
            ${t}
        </span>
    `}function g(e){const t=(e||"unknown").toLowerCase(),o={youtube:`
            <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                <path d="M23.5 6.2a2.8 2.8 0 0 0-2-2C19.7 3.6 12 3.6 12 3.6s-7.7 0-9.5.6a2.8 2.8 0 0 0-2 2A29 29 0 0 0 0 12a29 29 0 0 0 .5 5.8 2.8 2.8 0 0 0 2 2c1.8.6 9.5.6 9.5.6s7.7 0 9.5-.6a2.8 2.8 0 0 0 2-2A29 29 0 0 0 24 12a29 29 0 0 0-.5-5.8zM9.6 15.5v-7L15.8 12l-6.2 3.5z"/>
            </svg>
        `,tiktok:`
            <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2v10.2a4.2 4.2 0 1 0 3.8 4.2V9.8a6.7 6.7 0 0 0 4 1.3V7.7a4.7 4.7 0 0 1-4-4.7h-3.8z"/>
            </svg>
        `,instagram:`
            <svg class="w-6 h-6 text-pink-500" fill="currentColor" viewBox="0 0 24 24">
                <path d="M7 2h10a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5zm5 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8zm5.5-.9a1.1 1.1 0 1 0 0 2.2 1.1 1.1 0 0 0 0-2.2z"/>
            </svg>
        `,facebook:`
            <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                <path d="M22 12a10 10 0 1 0-11.6 9.9v-7h-2v-3h2V9.5c0-2 1.2-3.1 3-3.1.9 0 1.8.2 1.8.2v2h-1c-1 0-1.3.6-1.3 1.2V12h2.3l-.4 3h-1.9v7A10 10 0 0 0 22 12z"/>
            </svg>
        `,unknown:`
            <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10"/>
                <path d="M12 8v4m0 4h.01"/>
            </svg>
        `};return o[t]??o.unknown}function v(){return`
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M13 7h6m0 0v6m0-6L10 16" />
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M5 5h4v4H5z" />
        </svg>
    `}function w(){return`
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <rect x="9" y="9" width="10" height="10" rx="2" />
            <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1" />
        </svg>
    `}function y(e){return(e||[]).map(t=>({...t,is_preferred:Number(t.is_preferred||0)}))}async function k(e){const t=document.getElementById("trickModal"),o=document.getElementById("modalBody");t.classList.remove("hidden"),o.innerHTML="Loading...";const n=await(await fetch(`/admin/trick-catalog/${e}/show-data`)).json();window.__CURRENT_TRICK=n.name,window.__CURRENT_VIDEOS=n.videos,document.getElementById("modalTitle").innerText=n.name,n.videos=y(n.videos),n.videos.sort((a,c)=>c.is_preferred-a.is_preferred);let i=`
        <div class="space-y-4">

            <div class="flex justify-between gap-4">
                <div class="flex-1">
                    <div class="font-bold mb-2">Notes</div>
                    <div class="text-sm mb-4">
                        ${n.notes??"No notes"}
                    </div>
                </div>

                <div>
                    ${(n.levels??[]).map(a=>h(a.name)).join("")}
                </div>
            </div>

            <div class="font-bold">Videos</div>

            <ul class="space-y-2">
    `;n.videos.forEach(a=>{i+=`
        <li class="flex justify-between items-center text-sm border-b py-2 px-2
            ${a.is_preferred?"bg-gray-50 border-l-4 border-black":""}">

            <div class="w-1/5 text-xl">
                ${g(a.platform)}
            </div>

            <div class="w-2/5 truncate">
                ${a.creator??"Unknown"}
            </div>

            <div class="w-2/5 flex justify-end gap-2">

                <a href="${a.url}" target="_blank"
                   class="inline-flex items-center gap-1 px-2 py-1 text-xs bg-black text-white">
                    ${v()}
                    Open
                </a>

                <button type="button"
                        onclick="copyToClipboard('${a.url}', this)"
                        class="inline-flex items-center gap-1 px-2 py-1 text-xs bg-gray-200">
                    <span>${w()}</span>
                    <span class="copy-label">Copy</span>
                </button>

            </div>

        </li>`}),i+="</ul></div>",o.innerHTML=i}function l(){document.getElementById("trickModal").classList.add("hidden")}document.addEventListener("click",e=>{e.target.closest("[data-close-modal]")&&l();const t=e.target.closest(".js-open-trick-modal");t&&k(t.dataset.id)});document.addEventListener("keydown",e=>{e.key==="Escape"&&l()});document.addEventListener("click",e=>{const t=e.target.closest(".js-copy-email");if(!t)return;const o=t.dataset.type,r=window.__CURRENT_TRICK,n=window.__CURRENT_VIDEOS;let i="";o==="simple"&&(i=TrickCatalogEmail.buildEmailSimple(r,n)),o==="grouped"&&(i=TrickCatalogEmail.buildEmailGrouped(r,n)),o==="preferred"&&(i=TrickCatalogEmail.buildEmailPreferredOnly(r,n)),TrickCatalogEmail.copyEmail(i,t)});
