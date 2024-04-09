const express = require('express');
const router = express.Router();
const mysql = require('mysql2');

// Create a MySQL database connection
const db = mysql.createConnection({
  host: 'localhost',    // Change to your database host
  user: 'root',         // Change to your database user
  password: '',         // Change to your database password
  database: 'yourdb',   // Change to your database name
});

// Connect to the database
db.connect((err) => {
  if (err) {
    console.error('Error connecting to MySQL:', err);
    return;
  }
  console.log('Connected to MySQL database');
});

// Define a route for user registration
router.post('/register', (req, res) => {
  const { username, email, password } = req.body;

  // You should add validation and hashing here
  // Insert the user into the database
  db.query(
    'INSERT INTO users (username, email, password) VALUES (?, ?, ?)',
    [username, email, password],
    (err, result) => {
      if (err) {
        console.error('Error registering user:', err);
        res.status(500).json({ error: 'An error occurred during registration' });
        return;
      }
      res.status(200).json({ message: 'User registered successfully' });
    }
  );
});

module.exports = router;
