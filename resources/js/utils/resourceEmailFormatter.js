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


function copyResourceEmail(text, button) {

    navigator.clipboard.writeText(text)
        .then(() => {

            const label = button.querySelector('.copy-label');

            if (!label) {
                return;
            }


            const original = label.innerText;

            label.innerText = 'Copied ✓';


            setTimeout(() => {

                label.innerText = original;

            }, 1500);

        });

}



function buildResourceEmail(resourceTitle, behaviors) {

    let output =
        `We've found these resources to help you with ${resourceTitle}:\n\n`;


    behaviors.forEach(behavior => {

        output += `${behavior.name}\n`;

        output += `${'-'.repeat(behavior.name.length)}\n`;


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

            output += `${platform}:\n`;

            grouped[platform].forEach(url => {

                output += `${url}\n`;

            });

            output += `\n`;

        });


        output += `\n`;

    });


    return output.trim();

}

export {
    buildBehaviorEmail,
    buildResourceEmail,
    copyResourceEmail
};