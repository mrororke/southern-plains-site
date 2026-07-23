console.log("EMAIL MODULE LOADED");function l(e){return(e||[]).map(o=>({...o,is_preferred:Number(o.is_preferred||0),platform:(o.platform||"unknown").toLowerCase()}))}function m(e,o){const t=l(o).map(n=>n.url).filter(Boolean).join(`
`);return`We've found these resources to help you teach your dog ${e}:

${t}`}function g(e,o){const t={};l(o).forEach(i=>{if(!i.url)return;const r=w(i.platform);t[r]||(t[r]=[]),t[r].push(i.url)});let n=`We've found these resources to help you teach your dog ${e}:

`;return Object.keys(t).forEach(i=>{n+=`${i}:
`,t[i].forEach(r=>{n+=`${r}
`}),n+=`
`}),n.trim()}function f(e,o){const n=l(o).filter(i=>i.is_preferred===1).map(i=>i.url).filter(Boolean).join(`
`);return`We've found these preferred resources to help you teach your dog ${e}:

${n}`}function h(e,o){navigator.clipboard.writeText(e).then(()=>{const t=o.querySelector(".copy-label");if(t){const n=t.innerText;t.innerText="Copied ✓",o.classList.add("opacity-70"),setTimeout(()=>{t.innerText=n,o.classList.remove("opacity-70")},1500)}}).catch(()=>{const t=o.querySelector(".copy-label");t&&(t.innerText="Failed",setTimeout(()=>{t.innerText="Copy"},1500))})}function w(e){return e?e.charAt(0).toUpperCase()+e.slice(1):"Unknown"}window.TrickCatalogEmail={buildEmailSimple:m,buildEmailGrouped:g,buildEmailPreferredOnly:f,copyEmail:h};const v=(()=>{let e;function o(){const t=document.getElementById("catalog-filter-form");if(!t)return;const n=t.querySelector('input[name="search"]');t.querySelectorAll("select").forEach(i=>{i.addEventListener("change",()=>{t.submit()})}),n&&(n.addEventListener("input",()=>{clearTimeout(e),e=setTimeout(()=>{t.submit()},350)}),n.addEventListener("keydown",i=>{if(i.key==="Escape"){if(n.value.length===0)return;n.value="",clearTimeout(e),t.submit()}}))}return{init:o}})();document.addEventListener("DOMContentLoaded",()=>{v.init()});function b(e){e||(e="unknown");const o=e.replaceAll("_"," ").replace(/\b\w/g,i=>i.toUpperCase()),t={advanced:"bg-fuchsia-500 text-white",body_awareness:"bg-blue-500 text-white",clicker_training:"bg-neutral-500 text-white",cool_tools:"bg-sky-400 text-white",cooperative_care:"bg-lime-500 text-white",diy:"bg-taupe-500 text-white",engagement:"bg-stone-500 text-white",enrichment:"bg-sky-500 text-white",fit_dog:"bg-olive-500 text-white",fit_dog_one:"bg-olive-300 text-white",fit_dog_two:"bg-olive-400 text-white",fit_dog_three:"bg-olive-600 text-white",foundations:"bg-green-500 text-white",handler_mechanics:"bg-rose-300 text-white",impulse_control:"bg-indigo-500 text-white",intermediate:"bg-pink-500 text-white",mouthwork:"bg-indigo-400 text-white",movement_puzzle:"bg-amber-500 text-white",nose_work:"bg-cyan-500 text-white",novice:"bg-rose-500 text-white",platforms:"bg-slate-500 text-white",performer:"bg-purple-500 text-white",performer_elite:"bg-violet-500 text-white",products:"bg-teal-500 text-white",reactivity:"bg-orange-500 text-white",recall:"bg-mist-500 text-white",shaping:"bg-mauve-500 text-white",targeting:"bg-red-500 text-white",tke_videos:"bg-emerald-500 text-white",treat_recipes:"bg-emerald-400 text-white",unknown:"bg-gray-300 text-black"};return`
        <span class="inline-flex items-center px-2 py-1 text-xs font-semibold ${t[e]??t.unknown}">
            ${o}
        </span>
    `}function x(e){const o=(e||"unknown").toLowerCase(),t={youtube:`
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
        `};return t[o]??t.unknown}function y(){return`
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M13 7h6m0 0v6m0-6L10 16" />
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M5 5h4v4H5z" />
        </svg>
    `}function k(){return`
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <rect x="9" y="9" width="10" height="10" rx="2" />
            <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1" />
        </svg>
    `}function E(e){return(e||[]).map(o=>({...o,is_preferred:Number(o.is_preferred||0)}))}async function _(e){var u;const o=document.getElementById("trickModal"),t=document.getElementById("modalBody");o.classList.remove("hidden"),document.body.classList.add("overflow-hidden"),t.innerHTML="Loading...";const i=await(await fetch(`/admin/trick-catalog/${e}/show-data`)).json();window.__CURRENT_TRICK=i.name,window.__CURRENT_VIDEOS=i.videos;const r=(u=i.videos)==null?void 0:u.some(a=>Number(a.is_preferred)===1),d=document.querySelector(".js-copy-email-preferred");d&&d.classList.toggle("hidden",!r),document.getElementById("modalTitle").innerText=i.name,i.videos=E(i.videos),i.videos.sort((a,p)=>p.is_preferred-a.is_preferred);let s=`
        <div class="space-y-4">

            <div class="flex justify-between gap-4">
                <div class="flex-1">
                    <div class="font-bold mb-2">Notes</div>
                    <div class="text-sm mb-4">
                        ${i.notes??"No notes"}
                    </div>
                </div>

                <div>
                    ${(i.levels??[]).map(a=>b(a.name)).join("")}
                </div>
            </div>

            <div class="font-bold">Videos</div>

            <ul class="space-y-2">
    `;i.videos.forEach(a=>{s+=`
        <li class="flex justify-between items-center text-sm py-2 px-2
            ${a.is_preferred?"bg-gray-200 border-l-4 border-black":""}">

            <div class="w-1/5 text-xl">
                ${x(a.platform)}
            </div>

            <div class="w-2/5 truncate">
                ${a.creator??"Unknown"}
            </div>

            <div class="w-2/5 flex justify-end gap-2">

                <a href="${a.url}" target="_blank"
                   class="inline-flex items-center gap-1 px-2 py-1 text-xs bg-black text-white">
                    ${y()}
                    Open
                </a>

                <button type="button"
                        onclick="copyToClipboard('${a.url}', this)"
                        class="inline-flex items-center gap-1 px-2 py-1 text-xs bg-gray-200">
                    <span>${k()}</span>
                    <span class="copy-label">Copy</span>
                </button>

            </div>

        </li>`}),s+="</ul></div>",t.innerHTML=s}function c(){document.getElementById("trickModal").classList.add("hidden"),document.body.classList.remove("overflow-hidden")}document.addEventListener("click",e=>{e.target.closest("[data-close-modal]")&&c();const o=e.target.closest(".js-open-trick-modal");o&&_(o.dataset.id)});document.addEventListener("keydown",e=>{e.key==="Escape"&&c()});document.addEventListener("click",e=>{const o=e.target.closest(".js-copy-email");if(!o)return;const t=o.dataset.type,n=window.__CURRENT_TRICK,i=window.__CURRENT_VIDEOS;let r="";t==="simple"&&(r=TrickCatalogEmail.buildEmailSimple(n,i)),t==="grouped"&&(r=TrickCatalogEmail.buildEmailGrouped(n,i)),t==="preferred"&&(r=TrickCatalogEmail.buildEmailPreferredOnly(n,i)),TrickCatalogEmail.copyEmail(r,o)});document.getElementById("trickModal").addEventListener("click",e=>{e.target===e.currentTarget&&c()});
