# TAP.NAME — Landing Page

Static marketing site for **TAP.NAME** (NFC business cards & Google Review stands, Hong Kong).

- `index.html` — the entire single-page site (Tailwind CDN + FontAwesome + Google Fonts)
- `tapnamelogo.png` — primary logo
- `tapnamelogowhite.png` — white/knockout logo (used as favicon)

No build step, no bundler, no package manager. The `index.html` is the source of truth.

---

## Local preview

```powershell
# serve locally on http://localhost:8000
python -m http.server 8000
```

Or just open `index.html` directly in a browser.

---

## Git workflow

```powershell
git status
git add -A
git commit -m "Describe your change"
git push origin main
```

---

## Deploying to cPanel (manual pull, as configured)

This repo is consumed by a cPanel account running **Git Version Control**. The
`.cpanel.yml` file at the repo root defines what runs on deploy.

### 1. One-time cPanel setup

1. Log in to cPanel → **Files → Git Version Control**.
2. **Create** a repository:
   - Toggle **Clone a Repository** on.
   - Clone URL: `https://github.com/hamzainfotech/tapname.git`
   - Repository Path: `repositories/tapname`  ← **must stay outside `public_html`**
   - Name: `tapname`
3. Deploy type: **Copy** (or pull + the `.cpanel.yml` below), deployment path
   `public_html/`.

> ⚠️ Never place the repo inside `public_html`, or `.git/` becomes publicly downloadable.

### 2. Deploying a change

In cPanel → **Files → Git Version Control → Manage → *tapname***:

- **Pull or Deploy** tab → **Update from Remote** (pulls your new commits)
- → **Deploy HEAD Commit** (runs `.cpanel.yml`)

### 3. Or from an SSH session

```bash
cd ~/repositories/tapname
git pull origin main
/usr/local/cpanel/3rdparty/bin/git-deploy
```

---

## `.cpanel.yml`

```yaml
---
deployment:
  tasks:
    - export DEPLOYPATH=$HOME/public_html/
    - /bin/mkdir -p $DEPLOYPATH
    - 'if command -v rsync >/dev/null 2>&1; then rsync -a --exclude=.git --exclude=.cpanel.yml --exclude=.gitignore --exclude=README.md ./ $DEPLOYPATH/; else /bin/cp -R index.html tapnamelogo.png tapnamelogowhite.png $DEPLOYPATH/; fi'
```

This copies the site files into `public_html/` and keeps `.git`, `.cpanel.yml`,
`.gitignore` and `README.md` out of the document root.

---

## Notes

- The inquiry form posts to **Formspree** (`https://formspree.io/f/xnpjroke`) — no
  backend on the server is required.
- Google Translate widget is injected via `cdn.gtranslate.net`.
- `index.html` uses the **Tailwind Play CDN**, so styles come from the CDN at
  runtime. Editing `index.html` and redeploying is all that's needed to change
  the live site.
