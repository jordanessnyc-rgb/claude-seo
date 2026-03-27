# Gas Pro Inspectors

NYC Local Law 152 gas piping inspection website for [gasproinspectors.com](https://gasproinspectors.com).

## About

Gas Pro Inspectors provides Local Law 152 gas piping inspections, GPS-1 & GPS-2 DOB filings, and compliance support for building owners across all five NYC boroughs. A subsidiary of Environmental Safeguard Solutions LLC.

## Live Site

- **Production:** [gasproinspectors.vercel.app](https://gasproinspectors.vercel.app)
- **Custom domain:** [gasproinspectors.com](https://gasproinspectors.com)

## Tech Stack

- Static HTML/CSS/JS (no framework)
- [Manrope](https://fonts.google.com/specimen/Manrope) typeface via Google Fonts
- [Web3Forms](https://web3forms.com/) for contact form submission
- Schema.org structured data (LocalBusiness, FAQPage, WebSite)
- Deployed on [Vercel](https://vercel.com)

## Project Structure

```
gasproinspectors/
  index.html                        # Homepage (single-page layout)
  styles.css                        # All site styles + responsive breakpoints
  script.js                         # Mobile nav, form validation, year auto-fill
  blog.html                         # Blog listing page (static)
  blog-local-law-152-liability.html # Blog post: LL152 liability guide
  blog.php                          # Blog listing (PHP/dynamic version)
  blog-post.php                     # Blog post template (PHP/dynamic version)
  robots.txt                        # Crawler directives (AI bots welcome)
  sitemap.xml                       # XML sitemap
  llms.txt                          # AI/LLM-friendly site summary
  .htaccess                         # Security headers, caching, compression
  assets/
    logo.png                        # Company logo
  admin/                            # Blog admin panel (PHP, for Hostinger)
  data/
    posts.json                      # Blog post data store
```

## Run Locally

No build step required. Open `index.html` directly in a browser, or serve with any static server:

```bash
# Python
python3 -m http.server 8080

# Node
npx serve .

# PHP (enables blog CMS)
php -S localhost:8080
```

## Deploy

Deployed automatically via Vercel. Any push to the `main` branch triggers a new production deployment.

To deploy manually:

```bash
vercel --prod
```

## SEO Features

- Local Law 152 inspection schedule table with active deadline highlighting
- Schema.org JSON-LD: Plumber/LocalBusiness, FAQPage, WebSite
- Open Graph and Twitter Card meta tags
- AI crawler friendly: robots.txt allows GPTBot, ClaudeBot, PerplexityBot
- llms.txt for AI search citation readiness
- Semantic HTML with proper heading hierarchy
- Mobile-first responsive design

## Contact

- **Phone:** (929) 305-1232
- **Email:** info@gasproinspectors.com
- **Address:** 47-58 43rd Street, Queens, NY 11104
