const http = require('http');
const fs = require('fs');
const path = require('path');
const ejs = require('ejs');

const server = http.createServer((req, res) => {
  if (req.url === '/') {
    // Read the EJS template
    const filePath = path.join(__dirname, 'index.ejs');

    fs.readFile(filePath, 'utf-8', (error, template) => {
      if (error) {
        console.error(error);
        res.writeHead(500, { 'Content-Type': 'text/plain' });
        res.end('Internal Server Error');
      } else {
        // Sample data to pass to the template
        const data = {
          pageTitle: 'My EJS Page',
          message: 'Hello, EJS!'
        };

        try {
          // Render the EJS template with the data
          const renderedContent = ejs.render(template, data);

          res.writeHead(200, { 'Content-Type': 'text/html' });
          res.end(renderedContent);
        } catch (renderError) {
          console.error(renderError);
          res.writeHead(500, { 'Content-Type': 'text/plain' });
          res.end('Error rendering the EJS template');
        }
      }
    });
  } else {
    res.writeHead(404, { 'Content-Type': 'text/plain' });
    res.end('404 Not Found');
  }
});

const port = 3000;
server.listen(port, () => {
  console.log(`Server is running on http://localhost:${port}`);
});
