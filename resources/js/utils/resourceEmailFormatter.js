function normalizeVideos(videos) {

    return (videos || []).map(video => ({
        ...video,
        platform: (video.platform || 'unknown').toLowerCase()
    }));

}


function capitalize(value) {

    if (!value) {
        return 'Unknown';
    }

    return value.charAt(0).toUpperCase() + value.slice(1);

}


/*
|--------------------------------------------------------------------------
| BEHAVIOR PLAIN TEXT FORMAT
|--------------------------------------------------------------------------
*/

function buildBehaviorEmail(trickName, videos) {

    const grouped = {};

    normalizeVideos(videos).forEach(video => {

        if (!video.url) {
            return;
        }

        const platform = capitalize(video.platform);

        if (!grouped[platform]) {
            grouped[platform] = [];
        }

        grouped[platform].push(video.url);

    });


    let output =
        `We've found these resources to help you teach your dog ${trickName}:\n\n`;


    Object.keys(grouped).forEach(platform => {

        output += `${platform}:\n`;

        grouped[platform].forEach(url => {

            output += `${url}\n`;

        });

        output += `\n`;

    });


    return output.trim();

}


/*
|--------------------------------------------------------------------------
| BEHAVIOR HTML FORMAT
|--------------------------------------------------------------------------
*/

function buildBehaviorHtml(behavior) {

    let html = `

        <div style="margin-top:20px;">

            <h3>
                ${behavior.name}
            </h3>

    `;


    const grouped = {};


    normalizeVideos(behavior.videos)
        .forEach(video => {

            if (!video.url) {
                return;
            }


            const platform = capitalize(video.platform);


            if (!grouped[platform]) {
                grouped[platform] = [];
            }


            grouped[platform].push(video.url);

        });



    Object.keys(grouped).forEach(platform => {


        html += `

            <p>

                <strong>${platform}</strong><br>

        `;


        grouped[platform].forEach(url => {


            html += `

                <a href="${url}">
                    ${url}
                </a>
                <br>

            `;


        });


        html += `

            </p>

        `;


    });


    html += `

        </div>

    `;


    return html;

}


/*
|--------------------------------------------------------------------------
| RESOURCE TEXT EMAIL
|--------------------------------------------------------------------------
*/

function buildResourceEmail(resourceTitle, behaviors) {

    let output =
        `We've found these resources to help you with ${resourceTitle}:\n\n`;


    behaviors.forEach(behavior => {


        output += `${behavior.name}\n`;

        output += `${'-'.repeat(behavior.name.length)}\n\n`;


        output += buildBehaviorEmail(
            behavior.name,
            behavior.videos
        );


        output += `\n\n`;

    });


    return output.trim();

}


/*
|--------------------------------------------------------------------------
| RESOURCE HTML EMAIL
|--------------------------------------------------------------------------
*/

function buildResourceHtml(resource, behaviors) {

    return `

        <div>

            <h2>
                ${resource.title}
            </h2>


            <div>

                ${resource.body}

            </div>


            <hr>


            <h2>
                Related Behavior Resources
            </h2>


            ${behaviors.map(buildBehaviorHtml).join('')}


        </div>

    `;

}


/*
|--------------------------------------------------------------------------
| COPY
|--------------------------------------------------------------------------
*/

async function copyResourceEmail(html, text, button) {

    try {

        if (navigator.clipboard && window.ClipboardItem) {


            const blobHtml = new Blob(
                [html],
                {
                    type: 'text/html'
                }
            );


            const blobText = new Blob(
                [text],
                {
                    type: 'text/plain'
                }
            );


            await navigator.clipboard.write(
                [
                    new ClipboardItem({
                        'text/html': blobHtml,
                        'text/plain': blobText
                    })
                ]
            );


        } else {

            await navigator.clipboard.writeText(text);

        }


        const label = button.querySelector('.copy-label');


        if (label) {

            const original = label.innerText;

            label.innerText = 'Copied ✓';


            setTimeout(() => {

                label.innerText = original;

            }, 1500);

        }


    } catch(error) {

        console.error(error);

    }

}


function stripHtml(html) {

    const div = document.createElement('div');

    div.innerHTML = html;

    return div.innerText;

}


export {
    buildBehaviorEmail,
    buildResourceEmail,
    buildResourceHtml,
    buildBehaviorHtml,
    stripHtml,
    copyResourceEmail
};