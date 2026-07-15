# reconnexion.tf

![banniere](https://github.com/user-attachments/assets/46fa3afc-6e7b-49e9-8c5d-389ab4161adf)

[reconnexion.tf](https://reconnexion.tf)

**reconnexion.tf** est une plateforme qui propose des solutions et services à destination des communautés, créateurs de contenus et initiatives ambitieuses francophones sur Team Fortress 2.
Nous accompagnons les créateurs dans leurs démarches de développement afin de les mettre en lumière et redynamiser la communauté française de TF2.

---

## Fonctionnalités principales

- 🎙️ **Articles & actualités** communautaires (blog avec liste, page article, extraits HTML tronqués, slugification, miniatures uploadées)
- 📺 **Streams en direct** Twitch (onglets FR / international) et YouTube Live, avec mise en cache côté serveur et tri par nombre de viewers
- 🧭 **Liste des serveurs publics** de nos partenaires, avec statut en temps réel (joueurs / carte) via SourceQuery
- 🔗 **Liens rapides** vers la connexion serveur (`steam://connect/...`) et ressources utiles
- 👥 **Pages annexes** : à propos, nous soutenir, politique de confidentialité, page de maintenance
- 🛠️ **Back-office** (`_admin/`) : authentification par session, gestion CRUD des articles (création, liste, modification, suppression)

---

## 🛠️ Technologies utilisées

- **PHP** (sans framework) — pages rendues côté serveur, modèles dans `_src/`
- **PDO / MySQL** — connexion avec bascule automatique environnement local / production
- **HTML / SCSS / JavaScript** — SCSS compilé avec `sass` (Dart Sass)
- **[PHP-Source-Query](https://github.com/xPaw/PHP-Source-Query)** (`sourcequery/`) — requêtes statut serveurs TF2
- **Twitch Helix API** & **YouTube Data API v3** — récupération des lives, avec refresh de token Twitch et cache JSON
- **Tarteaucitron.io** — gestion du consentement aux cookies (RGPD)
- **Google Analytics (gtag)** — suivi d'audience
- **Git** — versionnement

---

## 📁 Structure du projet

```text
reconnexion.tf/
├── _src/            # Configuration & modèles PHP (config, news_model, admin_model, sourcequery)
├── _templates/      # Fragments HTML réutilisables (header, footer, sections, nav)
├── _admin/          # Back-office (authentification + CRUD articles)  [gitignored]
├── _js/             # Scripts front (streams.js, server-queries.js, tac_init.js)
├── _scss/ / _css/   # Sources SCSS et CSS compilé
├── _img/ / _fonts/  # Ressources graphiques et polices TF2
├── _script/         # Scripts serveur (fetch Twitch/YouTube, .env)  [.env gitignored]
├── tarteaucitron/   # Bibliothèque de gestion des cookies
├── sourcequery/     # Vendeur PHP-Source-Query
├── news/            # Blog : liste des actualités + page article
├── connect/         # Redirections steam://connect vers les serveurs
├── errors/          # Pages d'erreur 403 / 404 / 500 / 503
├── index.php        # Page d'accueil
├── a-propos.php, nous-soutenir.php, confidentialite.php, maintenance.php
├── .env             # Variables d'environnement (DB, clés API)  [gitignored]
├── package.json     # Dépendances de dev (sass) et script de compilation
└── README.md
```

## 🔧 Mode maintenance

Un interrupteur est disponible dans `_src/config.php` (`$maintenance = true;`). Lorsqu'il est activé, tous les visiteurs sont redirigés vers `maintenance.php` (sauf l'IP de l'administrateur).

---

## 📜 Licence

Ce projet est publié uniquement à des fins de **démonstration**.  
**Tous droits réservés** – aucune réutilisation n'est autorisée sans l'accord de l'auteur.  
Voir [LICENSE.md](LICENSE.md) pour le détail.  
Pour toute demande d'utilisation, merci de me contacter.
