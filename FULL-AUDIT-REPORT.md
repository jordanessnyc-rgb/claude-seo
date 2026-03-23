# Full SEO Audit Report: gasproinspectors.com

**Audit Date:** 2026-03-23
**URL:** https://gasproinspectors.com
**Business:** Gas Pro Inspectors (subsidiary of Environmental Safeguard Solutions LLC)
**Type:** Local Service Business (SAB) — NYC Local Law 152 Gas Piping Inspections
**Auditor:** Claude SEO v1.6.0 (8 parallel subagents)

---

## Executive Summary

### Overall SEO Health Score: 38/100

| Category | Weight | Score | Weighted |
|----------|--------|-------|----------|
| Technical SEO | 22% | 32/100 | 7.0 |
| Content Quality | 23% | 61/100 | 14.0 |
| On-Page SEO | 20% | 42/100 | 8.4 |
| Schema / Structured Data | 10% | 52/100 | 5.2 |
| Performance (CWV) | 10% | 50/100 | 5.0 |
| AI Search Readiness | 10% | 37/100 | 3.7 |
| Images | 5% | 35/100 | 1.8 |
| **Total** | **100%** | | **45.1** |

### Business Type Detected: **Local Service Business (SAB)**
- Industry: Home Services / Compliance Inspections
- Service Area: All 5 NYC Boroughs (Manhattan, Brooklyn, Queens, The Bronx, Staten Island)
- Primary Service: NYC Local Law 152 Gas Piping Inspections & DOB Filings

### Top 5 Critical Issues
1. **No meta description** — Google auto-generates one, reducing CTR
2. **No viewport meta tag** — site fails mobile-first indexing (60%+ of local searches are mobile)
3. **Single-page architecture** — only 1 indexable URL; can't rank for long-tail keywords
4. **blog.php returns 404** — listed in sitemap, actively sending crawlers to a dead page
5. **No Google Business Profile** link or verified GBP listing detected

### Top 5 Quick Wins
1. Add `<meta name="viewport">` tag (1 line of HTML)
2. Add `<html lang="en">` attribute (1 line)
3. Add `<link rel="canonical">` tag (1 line)
4. Add meta description (1 line — immediate CTR improvement)
5. Remove blog.php from sitemap.xml or fix the 404

---

## 1. Technical SEO (Score: 32/100)

### 1.1 Crawlability & Indexability — 35/100

**Findings:**
- robots.txt is present and permissive — `User-agent: * / Allow: /` — correct
- Sitemap.xml contains only 2 URLs (homepage + blog.php)
- **blog.php returns 404** — critical error directing crawlers to a dead page
- **No canonical tag** — vulnerable to duplicate content from URL parameters, trailing slashes, www/non-www variants
- **No meta robots directives** — zero explicit indexability guidance
- Anchor-based navigation (#home, #about, etc.) — search engines cannot index sections as separate pages

**Recommendations:**
1. Remove blog.php from sitemap or fix the 404 (redirect to homepage if no blog planned)
2. Add self-referencing canonical: `<link rel="canonical" href="https://gasproinspectors.com/" />`
3. Expand site to multi-page architecture (see Section 4 below)
4. Expand sitemap to include all new pages — target 15-20 indexable URLs minimum
5. Set up Google Search Console and submit corrected sitemap

### 1.2 URL Structure & Architecture — 25/100

**Findings:**
- Entire site is one page with anchor fragments (#home, #about, #services, etc.)
- Fragments are not crawlable URLs — Google treats them all as the same page
- blog.php is the only secondary URL (broken)
- No breadcrumb navigation
- No internal link equity distribution

**Recommendations:**
1. Migrate to multi-page architecture with clean URLs:
   - `/local-law-152-gas-inspections/`
   - `/services/`
   - `/about/`
   - `/faq/`
   - `/contact/`
   - `/blog/` with individual post pages
   - `/manhattan/`, `/brooklyn/`, `/queens/`, `/bronx/`, `/staten-island/` (borough pages)
2. Implement breadcrumb navigation with BreadcrumbList schema
3. Remove `.php` extensions via URL rewriting

### 1.3 Mobile & Viewport — 15/100

**Findings:**
- **No viewport meta tag detected** — critical mobile SEO failure
- Google uses mobile-first indexing — without viewport tag, severe ranking penalty
- No evidence of responsive design indicators

**Recommendations:**
1. **Immediately add:** `<meta name="viewport" content="width=device-width, initial-scale=1">`
2. Test with Google Mobile-Friendly Test tool
3. Ensure responsive CSS at 320px, 375px, 414px, 768px, 1024px breakpoints

### 1.4 Security — 45/100

**Findings:**
- HTTPS is active — baseline met
- No Content Security Policy (CSP)
- No HSTS, X-Content-Type-Options, X-Frame-Options, Referrer-Policy, Permissions-Policy
- No security.txt file

**Recommendations:**
1. Add HSTS header: `Strict-Transport-Security: max-age=31536000; includeSubDomains`
2. Add security headers via .htaccess:
   ```
   X-Content-Type-Options: nosniff
   X-Frame-Options: SAMEORIGIN
   Referrer-Policy: strict-origin-when-cross-origin
   ```
3. Create `/.well-known/security.txt`

### 1.5 Core Web Vitals Indicators — 50/100

**Findings:**
- No lazy-loading on images — all load eagerly on single-page site
- No preload/prefetch/preconnect tags
- No web fonts (positive — no FOIT/FOUT)
- External stock image from Pexels CDN without preconnect hint
- Only 2 images total — minimal payload (positive)
- No favicon — causes repeated 404 requests

**Recommendations:**
1. Add `loading="lazy"` to below-fold images
2. Add `<link rel="preconnect" href="https://images.pexels.com">`
3. Add favicon: `<link rel="icon" href="/favicon.ico">`
4. Self-host the stock image — serve as WebP
5. Add explicit width/height on all `<img>` tags (prevents CLS)

### 1.6 JavaScript & Resource Loading — 30/100

**Findings:**
- No async/defer on scripts — all are render-blocking
- **No analytics (GA4, GTM)** — zero traffic/conversion data
- No conversion tracking on phone clicks or form submissions

**Recommendations:**
1. Add `defer` to all non-critical scripts
2. Install GA4 with async loading
3. Set up conversion tracking for tel: links, form submissions, email clicks
4. Install Google Tag Manager for flexible tag management

### 1.7 International SEO — 10/100

**Findings:**
- **No `lang` attribute on HTML tag** — browsers and screen readers can't determine language
- WCAG 2.1 Level A violation

**Recommendation:** Add `<html lang="en">` — one-line fix with outsized impact.

### 1.8 IndexNow / Search Console — 10/100

**Findings:**
- No Google Search Console integration detected
- No Bing Webmaster Tools
- No IndexNow implementation
- Sitemap contains a 404 URL

**Recommendations:**
1. Set up Google Search Console — verify via DNS TXT record
2. Set up Bing Webmaster Tools (powers Copilot, ChatGPT search)
3. Implement IndexNow for instant Bing/Yandex indexing

---

## 2. Content Quality (Score: 61/100)

### 2.1 E-E-A-T Assessment

| Factor | Score | Summary |
|--------|-------|---------|
| Experience | 48/100 | Claims experience but no evidence: no case counts, no named inspectors, generic testimonials |
| Expertise | 55/100 | FAQ demonstrates knowledge, Community District schedule is unique. Blog is 404. No code citations. |
| Authoritativeness | 42/100 | No press mentions, no industry memberships, no verified credentials visible |
| Trustworthiness | 58/100 | Address provided, FAQ transparent about penalties. No privacy policy, no pricing, no license number. |

**Key Recommendations:**
1. Add quantified experience: "Over X buildings inspected since [year]"
2. Display Master Plumber license number with DOB verification link
3. Fix the 404 blog — it actively damages credibility
4. Add privacy policy and terms of service
5. Add pricing guidance (even a range)
6. Reference specific NYC Administrative Code sections (§28-318.3)

### 2.2 Content Depth — 62/100

- ~3,200-3,500 words for a single-page site covering compliance — adequate but not deep
- Community District schedule is a high-value differentiator
- Missing content: post-inspection process, building type guidance, cost info, 2026 deadlines

### 2.3 Keyword Optimization — 58/100

**Primary keyword "Local Law 152"** is well-represented. Significant missed opportunities:
- "Local Law 152 inspection cost" (high commercial intent)
- "Local Law 152 deadline 2026" (time-sensitive)
- "GPS-2 form NYC" (informational)
- Borough-specific terms ("gas inspection Brooklyn", etc.)

### 2.4 Content Gaps

| Gap | Intent | Priority |
|-----|--------|----------|
| Pricing / cost information | Commercial | Critical |
| 2026 deadline calendar | Informational / Urgent | Critical |
| Blog content (currently 404) | Informational | Critical |
| Building type guidance (co-op, condo, commercial) | Informational | High |
| Post-inspection process | Informational | High |
| Borough-specific landing pages | Local / Commercial | High |
| GPS-1 vs GPS-2 explanation | Informational | Medium |
| DOB filing process | Informational | Medium |

### 2.5 AI Citation Readiness — 45/100

- FAQ schema is the strongest GEO element
- Facts present ($10K penalty, 4-year cycle) but lack source attribution
- No publication dates, no author bylines
- No llms.txt file (returns 404)
- No statutory citations (NYC Admin Code sections)

---

## 3. On-Page SEO (Score: 42/100)

### 3.1 Title Tag — 62/100

**Current:** `NYC Local Law 152 Gas Inspections | Gas Pro Inspectors | All 5 Boroughs` (68 chars)

**Issue:** At 68 characters, "All 5 Boroughs" gets truncated in most SERPs.

**Recommended:** `NYC Local Law 152 Gas Inspections — Gas Pro Inspectors` (55 chars)

### 3.2 Meta Description — 0/100 (CRITICAL)

**Current:** None.

**Recommended:**
```html
<meta name="description" content="Licensed NYC Local Law 152 gas piping inspections. GPS-1 & GPS-2 filings for all five boroughs. Fast scheduling, DOB-compliant reports. Call (929) 305-1232.">
```

### 3.3 Heading Hierarchy — 40/100

**Critical Issue:** Two H1 tags found:
1. "NYC Compliance Specialists" (generic, no keyword value)
2. "NYC Local Law 152 Gas Inspections — Fast, Compliant, Filed For You" (excellent)

**Fix:** Demote the first to a styled `<p>` tag. Keep the second as the sole H1.

### 3.4 Internal Linking — 25/100

All links are anchor-based (#home, #about, etc.) — pass no PageRank, create no crawlable link graph. A multi-page architecture is needed.

### 3.5 Image Optimization — 35/100

**Only 2 unique images:**
1. `assets/logo.png` (alt: "Gas Pro Inspectors logo") — used twice
2. External Pexels stock photo (alt: "New York City skyline")

**Issues:**
- Severe image scarcity — need team photos, work photos, certification images
- Stock photo signals low trust
- No WebP/AVIF format
- No width/height attributes (CLS risk)
- No lazy-loading

**Needs at minimum:** 1 team photo, 2-3 inspection photos, 1 certification image, 1 process infographic.

### 3.6 Call-to-Action — 55/100

- Contact form present with good fields (Name, Email, Phone, Building Address, Units, Message)
- "We'll Reply Within 2 Hours" is a strong promise
- Missing: sticky mobile CTA bar, clickable tel: link in content, urgency messaging near CTA

---

## 4. Schema & Structured Data (Score: 52/100)

### Currently Implemented

**LocalBusiness Schema** — Present but incomplete:
- Has: name, description, url, telephone, email, logo, address (partial), areaServed, serviceType, parentOrganization
- Missing: postalCode, geo (lat/lng), openingHoursSpecification, image, priceRange, sameAs, aggregateRating, hasCredential

**FAQPage Schema** — Well-implemented with 8 Q&A pairs (78/100)

### Missing Schema Types

| Schema | Priority | Impact |
|--------|----------|--------|
| Service (GPS-1, GPS-2) | High | Connects services to search intent |
| AggregateRating + Review | High | Enables star ratings in SERPs |
| WebSite + SearchAction | High | Sitelinks search box |
| WebPage | High | Page entity connections |
| Organization (parent) | Medium | Entity graph completeness |
| BreadcrumbList | Medium | Breadcrumb rich results |
| Person (Master Plumber) | Medium | Expert author signals |
| HowTo | Low | Process rich results |

### Recommended Schema Additions

Change `@type` from `LocalBusiness` to `Plumber` (more specific). Add:
- `postalCode` (currently missing — significant gap)
- `geo` with lat/lng coordinates
- `openingHoursSpecification`
- `sameAs` array for social profiles
- `hasCredential` for Master Plumber license
- `aggregateRating` based on review data
- Individual `Service` entities for each offering

---

## 5. Local SEO (Score: 27/100)

### 5.1 Google Business Profile — 20/100

- **No GBP link visible on site** — unclear if verified listing exists
- Footer "Google" link goes to a generic search query, not a GBP listing
- No Maps embed, no review link, no GBP short URL
- No business hours listed

**Action:** Claim and verify GBP as SAB. Category: "Plumber" + "Gas Installation Service". Define 5 boroughs as service area.

### 5.2 NAP Consistency — 35/100

- **Address incomplete:** "47-58 43rd Street, Queens, NY" — no zip code
- Name inconsistency risk: "Gas Pro Inspectors" vs. "Environmental Safeguard Solutions LLC"
- Phone is consistent across site and schema

**Action:** Add zip code everywhere. Standardize per USPS format.

### 5.3 Citations — 15/100

- No evidence of structured citation building
- Only social link: LinkedIn (URL not even visible)
- Zero presence on Yelp, BBB, Angi, HomeAdvisor, Thumbtack

**Action:** Build 20+ citations across core directories, industry directories, and NYC-specific directories.

### 5.4 Review Signals — 25/100

- 4 testimonials on site (Maria T., Robert K., Sandra L., James W.)
- No Review schema markup
- No link to leave reviews on any platform
- No third-party review widgets

**Action:** Add Review schema. Create review generation system targeting 5+ Google reviews/month.

### 5.5 Service Area Pages — 10/100

- Single-page site — cannot rank for borough-specific or service-specific queries
- Competitors likely have dedicated pages for each borough

**Action:** Create 5 borough pages + 4-5 service pages + Community District deadline pages. Target 15-20 indexable URLs.

---

## 6. AI Search / GEO Readiness (Score: 37/100)

### 6.1 AI Crawler Access — 75/100
- robots.txt allows all crawlers — good
- But only 1 indexable URL for AI to ingest

### 6.2 llms.txt — 0/100
- No llms.txt file exists (404)
- Missed opportunity for AI-structured business summary

### 6.3 Content Citability — 50/100
- Strong citable facts ($10K penalty, 4-year cycle, 120-day correction window)
- But no source attribution, no statutory citations, no publication dates

### 6.4 Brand Mentions — 20/100
- Very low brand presence outside the website
- No Wikipedia, Wikidata, or Crunchbase entries

### 6.5 Authority Signals — 30/100
- License claim present but unverified (no number displayed)
- No author profiles, no published dates, no editorial policy

---

## 7. Performance / Images Summary

### Images — 35/100
- Only 2 unique images — severe scarcity
- One is a stock photo (low trust)
- No WebP format, no lazy-loading, no explicit dimensions

### Performance Indicators — 50/100
- Minimal page weight (positive due to few images/no fonts)
- No lazy-loading, no preconnect hints
- No render-blocking optimization
- No favicon (causes 404 per request)

---

## Appendix: Site Crawl Summary

| URL | Status | Notes |
|-----|--------|-------|
| https://gasproinspectors.com/ | 200 OK | Homepage (single-page site) |
| https://gasproinspectors.com/blog.php | 404 | Broken — in sitemap and navigation |
| https://gasproinspectors.com/robots.txt | 200 OK | Permissive, references sitemap |
| https://gasproinspectors.com/sitemap.xml | 200 OK | 2 URLs (1 broken) |
| https://gasproinspectors.com/llms.txt | 404 | Not found |
| https://gasproinspectors.com/.well-known/security.txt | 404 | Not found |

**Pages crawled:** 2 (of 2 in sitemap)
**Pages with errors:** 1 (blog.php — 404)
**Indexable pages:** 1 (homepage only)

---

*Report generated by Claude SEO v1.6.0 — https://github.com/AgriciDaniel/claude-seo*
