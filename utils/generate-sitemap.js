const fs = require('fs');
const path = require('path');

// Variables to setup
const baseUrl = 'https://lacorbeille.studio/';
const excludedPages = ['404.html', '500.html', '403.html', 'links.lacorbeille.studio/index.html'];
const priorityPages = ['index.html'];
const defaultPriority = 0.8;

// Recursively get all .html files (relative to baseDir)
function getHtmlFiles(dir, baseDir = dir) {
    let results = [];
    const list = fs.readdirSync(dir);
    list.forEach(file => {
        const filePath = path.join(dir, file);
        const stat = fs.statSync(filePath);
        if (stat && stat.isDirectory()) {
            results = results.concat(getHtmlFiles(filePath, baseDir));
        } else if (
            file.endsWith('.html') &&
            !excludedPages.includes(file)
        ) {
            // Get relative path from baseDir and use forward slashes
            const relPath = path.relative(baseDir, filePath).replace(/\\/g, '/');
            results.push(relPath);
        }
    });
    return results;
}

// Generate sitemap content
function generateSitemap(pages, priorityPages) {
    const currentDate = new Date().toISOString().split('T')[0];

    let xml = `<?xml version="1.0" encoding="UTF-8"?>
    <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">`;

    pages.forEach(page => {
        xml += `
        <url>
            <loc>${baseUrl}${page}</loc>
            <lastmod>${currentDate}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>${priorityPages.includes(page) ? '1' : defaultPriority}</priority>
        </url>`;
    });

    xml += `
    </urlset>`;

    return xml;
}

// List pages to include in the sitemap (recursively)
const baseDir = path.join(__dirname, '../');
const pages = getHtmlFiles(baseDir);

// Write content to sitemap.xml
const sitemapPath = path.join(baseDir, 'sitemap.xml');
const sitemapContent = generateSitemap(pages, priorityPages);

fs.writeFile(sitemapPath, sitemapContent, err => {
    if (err) {
        console.error('Error while generating the sitemap:', err);
    } else {
        console.log('The file sitemap.xml has been generated successfully!');
    }
});