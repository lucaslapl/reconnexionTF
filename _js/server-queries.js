const serverIds = ['holiday', 'vanilla', 'custom', 'mvm', 'tfdb'];

fetch('_inc/sourcequery.php')
  .then(res => res.json())
  .then(data => {
    serverIds.forEach(id => {
      const srv = data[id];
      const container = document.getElementById(`${id}-srv`);

      if (!container || !srv) return;

      const info = srv.error
        ? `❌ Erreur : ${srv.error}`
        : `${srv.players} / ${srv.maxPlayers} - ${srv.map}`;

      const connectUrl = `steam://connect/${srv.ip}:${srv.port}`;

      container.querySelector('.server-title p').textContent = info;
      container.querySelector('.server-connect a').setAttribute('href', connectUrl);
    });
  })
  .catch(err => {
    console.error("Erreur lors du chargement des serveurs :", err);
  });