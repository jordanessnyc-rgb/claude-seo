# SEO Action Plan: gasproinspectors.com

**Generated:** 2026-03-23
**Overall SEO Health Score:** 38/100
**Target Score:** 75/100 within 90 days

---

## Critical Priority (Fix Immediately — Week 1)

> These issues block indexing, damage credibility, or cause ranking penalties.

### 1. Add Meta Description
**Impact:** High | **Effort:** 5 minutes
```html
<meta name="description" content="Licensed NYC Local Law 152 gas piping inspections. GPS-1 & GPS-2 filings for all five boroughs. Fast scheduling, DOB-compliant reports. Call (929) 305-1232.">
```

### 2. Add Viewport Meta Tag
**Impact:** Critical | **Effort:** 5 minutes
```html
<meta name="viewport" content="width=device-width, initial-scale=1">
```
Without this, the site fails Google's mobile-first indexing. 60%+ of local searches are mobile.

### 3. Add HTML Lang Attribute
**Impact:** Medium | **Effort:** 1 minute
```html
<html lang="en">
```

### 4. Add Canonical Tag
**Impact:** Medium | **Effort:** 1 minute
```html
<link rel="canonical" href="https://gasproinspectors.com/" />
```

### 5. Fix blog.php 404
**Impact:** High | **Effort:** 10 minutes
- **Option A:** Create a working blog page with at least one article
- **Option B:** Remove blog.php from sitemap.xml and navigation menu
- **Option C:** 301-redirect blog.php to homepage (temporary)

### 6. Fix Sitemap
**Impact:** Medium | **Effort:** 10 minutes
- Remove the broken blog.php URL
- Update lastmod dates
- Submit corrected sitemap to Google Search Console

### 7. Fix Dual H1 Tags
**Impact:** Medium | **Effort:** 5 minutes
- Demote "NYC Compliance Specialists" from `<h1>` to `<p class="tagline">`
- Keep "NYC Local Law 152 Gas Inspections — Fast, Compliant, Filed For You" as sole H1

### 8. Add Favicon
**Impact:** Low | **Effort:** 5 minutes
```html
<link rel="icon" href="/favicon.ico">
```

---

## High Priority (Fix Within 2 Weeks)

> Significantly impacts rankings, visibility, and conversions.

### 9. Claim & Verify Google Business Profile
**Impact:** Critical for local SEO | **Effort:** 1-2 hours
- Register as Service Area Business (SAB)
- Primary category: "Plumber"
- Secondary: "Gas Installation Service" or "Building Inspector"
- Define all 5 boroughs as service area
- Upload team photos, logo, inspection photos
- Add business hours
- Pre-populate Q&A with the 8 existing FAQ items

### 10. Install Google Analytics 4 + Google Tag Manager
**Impact:** High | **Effort:** 30 minutes
- Add GA4 with async loading
- Track conversions: phone clicks (tel: links), form submissions, email clicks
- Set up goals for each conversion type

### 11. Complete Address — Add Zip Code
**Impact:** High for local SEO | **Effort:** 10 minutes
- Add zip code to visible address on site
- Update `postalCode` in LocalBusiness schema
- Standardize: `47-58 43rd St, Queens, NY [ZIP]`

### 12. Enrich LocalBusiness Schema
**Impact:** High | **Effort:** 1 hour
Add missing properties:
- `postalCode`
- `geo` (latitude/longitude)
- `openingHoursSpecification`
- `priceRange`
- `sameAs` (social profile URLs)
- `hasCredential` (Master Plumber license)
- Change `@type` from `LocalBusiness` to `Plumber`

### 13. Add Review Schema Markup
**Impact:** High | **Effort:** 1 hour
- Add `@type: Review` to each testimonial (Maria T., Robert K., Sandra L., James W.)
- Add `AggregateRating` to LocalBusiness schema
- Include `reviewRating`, `author`, `datePublished`, `reviewBody`

### 14. Display Master Plumber License Number
**Impact:** High (trust & authority) | **Effort:** 15 minutes
- Show license number prominently on the site
- Link to NYC DOB license verification page
- Add to `hasCredential` in schema

### 15. Add Service Schema
**Impact:** Medium | **Effort:** 1 hour
Create individual `@type: Service` entities for:
- Local Law 152 Gas Piping Inspection
- GPS-1 Initial Filing
- GPS-2 Completion Filing
- Violation Monitoring (CityWatch)

### 16. Add Security Headers
**Impact:** Medium | **Effort:** 30 minutes
Add to .htaccess or server config:
```
Strict-Transport-Security: max-age=31536000; includeSubDomains
X-Content-Type-Options: nosniff
X-Frame-Options: SAMEORIGIN
Referrer-Policy: strict-origin-when-cross-origin
```

### 17. Add Open Graph Tags
**Impact:** Medium (social sharing) | **Effort:** 15 minutes
```html
<meta property="og:type" content="website">
<meta property="og:title" content="NYC Local Law 152 Gas Inspections | Gas Pro Inspectors">
<meta property="og:description" content="Licensed NYC gas piping inspections. GPS-1 & GPS-2 filings for all five boroughs.">
<meta property="og:url" content="https://gasproinspectors.com/">
<meta property="og:image" content="https://gasproinspectors.com/assets/og-image.jpg">
```

---

## Medium Priority (Fix Within 30 Days)

> Optimization opportunities that improve rankings and user experience.

### 18. Build Multi-Page Site Architecture
**Impact:** Very High (long-term) | **Effort:** 2-4 weeks

**Borough Landing Pages (5 pages):**
- `/manhattan-local-law-152-inspection/`
- `/brooklyn-local-law-152-inspection/`
- `/queens-local-law-152-inspection/`
- `/bronx-local-law-152-inspection/`
- `/staten-island-local-law-152-inspection/`

**Service Pages (4 pages):**
- `/local-law-152-gas-piping-inspection/`
- `/gps-1-gps-2-dob-filing/`
- `/violation-remediation/`
- `/citywatch-violation-monitoring/`

**Informational Pages (3 pages):**
- `/about/` (team, credentials, license info)
- `/faq/` (standalone with expanded questions)
- `/contact/`

**Blog (ongoing):**
- `/blog/` with at least 2 posts/month

**Target: 15-20 indexable URLs** (up from 1)

### 19. Launch Blog with Cornerstone Content
**Impact:** High | **Effort:** 1-2 weeks
First 5 articles:
1. "Complete Guide to NYC Local Law 152 in 2026" (2,000+ words — cornerstone)
2. "GPS-1 vs GPS-2: What NYC Building Owners Need to Know"
3. "Local Law 152 Inspection Cost: What to Expect in 2026"
4. "Community District Deadlines for Local Law 152 (2026 Schedule)"
5. "What Happens If You Fail a Local Law 152 Gas Inspection?"

### 20. Build Core Citations (20+ directories)
**Impact:** High for local SEO | **Effort:** 2-3 hours

**Tier 1 (Core):** Yelp, BBB, Angi, HomeAdvisor, Thumbtack, Apple Business Connect, Bing Places, Facebook Business
**Tier 2 (Industry):** BOMA NY, REBNY, CooperatorNews, Habitat Magazine
**Tier 3 (General):** MapQuest, YellowPages, Superpages, Manta

### 21. Create Review Generation System
**Impact:** High | **Effort:** 1 hour setup
- After each GPS-2 filing, send automated email/SMS requesting Google review
- Include direct GBP review link
- Target: 5+ new Google reviews per month

### 22. Create llms.txt File
**Impact:** Medium (AI search) | **Effort:** 30 minutes
Create `/.well-known/llms.txt` with structured business summary, services, key facts, and contact info for AI systems.

### 23. Improve Image Assets
**Impact:** Medium | **Effort:** 1-2 weeks
Add at minimum:
- 1 team/inspector photo (trust signal)
- 2-3 on-site inspection photos (expertise)
- 1 certification/license image (authority)
- 1 process infographic (GPS-1 vs GPS-2)
- All in WebP format, with alt text, width/height, lazy-loading

### 24. Add Pricing Transparency
**Impact:** Medium-High | **Effort:** 30 minutes
Even a range ("Inspections start at $X per building") reduces friction and captures "Local Law 152 cost" search queries.

### 25. Add Statutory Citations
**Impact:** Medium | **Effort:** 1 hour
- Reference NYC Administrative Code §28-318.3 in content
- Link to official DOB LL152 page
- Link to GPS-1 and GPS-2 form downloads
- Source all penalty and deadline claims

---

## Low Priority (Backlog — Within 90 Days)

### 26. Implement IndexNow Protocol
For instant Bing/Yandex indexing when content changes.

### 27. Add WebSite + WebPage Schema
Enables sitelinks search box and page entity connections.

### 28. Build Brand Entity Signals
- Complete LinkedIn company page with regular posts
- Facebook Business page
- Crunchbase profile for Environmental Safeguard Solutions LLC
- Seek mentions in NYC real estate publications

### 29. Add Expert Author Profiles
Feature the Licensed Master Plumber by name with bio, headshot, license number, and Person schema.

### 30. Create Community District Deadline Pages
Time-sensitive landing pages for each CD approaching its deadline — high conversion intent.

### 31. Consider Spanish-Language Version
NYC's diverse demographics may warrant a Spanish-language section with proper hreflang implementation.

### 32. Add Privacy Policy & Terms of Service
Legally required for form data collection. Trust signal for both users and search engines.

---

## 90-Day Milestone Targets

| Metric | Current | 30 Days | 60 Days | 90 Days |
|--------|---------|---------|---------|---------|
| SEO Health Score | 38 | 55 | 65 | 75 |
| Indexable Pages | 1 | 8 | 15 | 20 |
| Google Reviews | 0 (visible) | 5 | 15 | 25 |
| Citations | ~0 | 10 | 20 | 30 |
| Blog Posts | 0 | 3 | 6 | 10 |
| Schema Types | 2 | 6 | 8 | 10 |
| Monthly Organic Traffic | Unknown | Baseline | +25% | +50% |

---

## Cost-Free Quick Wins (Under 1 Hour Total)

These 8 items cost nothing and take under 1 hour combined:

1. Add viewport meta tag (1 min)
2. Add `<html lang="en">` (1 min)
3. Add canonical tag (1 min)
4. Add meta description (5 min)
5. Fix dual H1 (5 min)
6. Add favicon (5 min)
7. Remove blog.php from sitemap (5 min)
8. Add zip code to address (5 min)

**Combined impact:** Technical SEO score jumps from 32 to ~55. On-page score jumps from 42 to ~60.

---

*Action plan generated by Claude SEO v1.6.0 — https://github.com/AgriciDaniel/claude-seo*
