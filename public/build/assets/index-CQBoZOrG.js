function d(e){e||(e="unknown");const a=e.replaceAll("_"," ").replace(/\b\w/g,n=>n.toUpperCase()),t={novice:"bg-gray-500 text-white",intermediate:"bg-blue-500 text-white",advanced:"bg-purple-500 text-white",performer:"bg-pink-500 text-white",performer_elite:"bg-black text-white",unknown:"bg-gray-300 text-black"};return`
        <span class="inline-flex items-center px-2 py-1 text-xs font-semibold ${t[e]??t.unknown}">
            ${a}
        </span>
    `}function l(e){const a=(e||"unknown").toLowerCase(),t={youtube:"▶️",tiktok:"🎵",instagram:"📸",facebook:"📘",unknown:"🔗"};return`<span class="text-lg">${t[a]??t.unknown}</span>`}function p(){return"↗"}function u(){return"📋"}async function m(e){const a=document.getElementById("trickModal"),t=document.getElementById("modalBody");a.classList.remove("hidden"),t.innerHTML="Loading...";const n=await(await fetch(`/admin/trick-catalog/${e}/show-data`)).json();document.getElementById("modalTitle").innerText=n.name,n.videos.sort((s,c)=>(c.is_preferred===!0)-(s.is_preferred===!0));let o=`
        <div class="space-y-4">

            <div class="flex justify-between gap-4">
                <div class="flex-1">
                    <div class="font-bold mb-2">Notes</div>
                    <div class="text-sm mb-4">
                        ${n.notes??"No notes"}
                    </div>
                </div>

                <div>
                    ${d(n.level)}
                </div>
            </div>

            <div class="font-bold">Videos</div>

            <ul class="space-y-2">
    `;n.videos.forEach(s=>{o+=`
        <li class="flex justify-between items-center text-sm border-b py-2 px-2
            ${s.is_preferred?"bg-gray-50 border-l-4 border-black":""}">

            <div class="w-1/5 text-xl">
                ${l(s.platform)}
            </div>

            <div class="w-2/5 truncate">
                ${s.creator??"Unknown"}
            </div>

            <div class="w-2/5 flex justify-end gap-2">

                <a href="${s.url}" target="_blank"
                   class="inline-flex items-center gap-1 px-2 py-1 text-xs bg-black text-white">
                    ${p()}
                    Open
                </a>

                <button type="button"
                        onclick="copyToClipboard('${s.url}', this)"
                        class="inline-flex items-center gap-1 px-2 py-1 text-xs bg-gray-200">
                    <span>${u()}</span>
                    <span class="copy-label">Copy</span>
                </button>

            </div>

        </li>`}),o+="</ul></div>",t.innerHTML=o}function i(){document.getElementById("trickModal").classList.add("hidden")}document.addEventListener("click",e=>{e.target.matches("[data-close-modal]")&&i(),e.target.classList.contains("js-open-trick-modal")&&m(e.target.dataset.id)});document.addEventListener("keydown",e=>{e.key==="Escape"&&i()});
