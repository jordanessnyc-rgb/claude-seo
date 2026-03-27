# Edit Blog on Hostinger (No Code Tools Needed)

## File to edit
- `public_html/blog.html`

## Where to edit
Look for this section in `blog.html`:
- `<!-- BLOG POSTS START -->`
- `<!-- BLOG POSTS END -->`

Only edit content inside that block.

## Add a new post card
1. Copy one full `<article class="blog-card"> ... </article>` block.
2. Paste it above `<!-- BLOG POSTS END -->`.
3. Update:
- `<p class="blog-meta">Category</p>`
- `<h3>Title</h3>`
- `<p>Summary</p>`
- `<a href="...">Button Text</a>`

## Keep layout working
- Keep all tags (`<article>`, `<p>`, `<h3>`, `<a>`) intact.
- Keep quote marks around links.
- Do not remove the `blog-grid` container.

## Publish changes
- Save `blog.html` in Hostinger File Manager.
- Refresh your site page (hard refresh if needed).

