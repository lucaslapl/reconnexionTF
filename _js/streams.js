/********* TWITCH INTEGRATION *********/


const allContainer = document.getElementById("streams-all");
const frContainer = document.getElementById("streams-fr");

function loadStreams(container, lang) {
  const url = lang ? `_script/fetch-streams.php?lang=${lang}` : '_script/fetch-streams.php';

  fetch(url)
    .then(res => res.json())
    .then(data => {
      //console.log("Twitch API response:", data);
      container.innerHTML = "";
      if (data.data.length === 0) {
        container.innerHTML = `<p class='no-stream'>Aucun streamer TF2${lang === 'fr' ? ' FR' : ''} sur Twitch en ce moment :(</p>`;
      } else {
        data.data.forEach(stream => {
          container.innerHTML += `
            <div class="stream_line">
              <a class="stream-link" href="https://twitch.tv/${stream.user_login}" target="_blank" title="${stream.title}">
                <span class="stream-title">
                  <span class="streamer-name">${stream.user_name}</span>
                  ${stream.title}
                </span>
                <span class="viewercount">${stream.viewer_count}</span>
              </a>
            </div>`;
        });
      }
    })
    .catch(err => {
      container.innerText = "Erreur de chargement.";
      console.error(err);
    });
}

window.addEventListener("DOMContentLoaded", function () {
  setTimeout(() => {
    loadStreams(allContainer);
    loadStreams(frContainer, 'fr');
  }, 300);
});


/********** YOUTUBE INTEGRATION **************/

fetch('_script/yt_streams.php')
  .then(response => response.json())
  .then(data => {
    const container = document.getElementById('streams-yt');
    container.innerHTML = '';

    if (!data.items || data.items.length === 0) {
      container.innerHTML = '<p>Aucun live actuellement.</p>';
      return;
    }

    data.items.forEach(video => {
      const vid = video.videoId;
      const title = video.title;
      const channel = video.channelTitle;
      const viewCount = video.viewCount ?? '-';

      const html = `
        <div class="stream_line">
          <a class="stream-link" href="https://www.youtube.com/watch?v=${vid}" target="_blank" title="${title}">
            <span class="stream-title">
              <span class="streamer-name">${channel}</span>
                ${title}
              </span>
            <span class="viewercount">${viewCount}</span>
          </a>
        </div>
      `;
      container.innerHTML += html;
    });
  })
  .catch(err => {
    console.error('Erreur de requête :', err);
  });


document.querySelectorAll(".tab-button").forEach(button => {
  button.addEventListener("click", () => {
    document.querySelectorAll(".tab-button").forEach(btn => btn.classList.remove("active"));
    document.querySelectorAll(".stream-tab").forEach(tab => tab.classList.remove("active"));

    button.classList.add("active");
    const tabId = button.getAttribute("data-tab");
    document.getElementById(`streams-${tabId}`).classList.add("active");
  });
});