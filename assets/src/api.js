// const express = require('express');
// const app = express();
// const morgan = require('morgan');
// const cors = require('cors');
// const mysql = require('mysql');
// const session = require('express-session');
// app.use(session({ secret: 'krunal', resave: false, saveUninitialized: true, }));

// app.use(morgan('combined'));
// app.use(cors());

// app.get("/word/:id", (request, response) => {
//     console.log("Fetching word id: " + request.params.id);
//     const connection = mysql.createConnection({
//         host: 'localhost',
//         user: 'root',
//         database: 'langapp'
//     })

//     const queryString = "SELECT * FROM user_words WHERE id_words = ?";
//     connection.query(queryString, [request.params.id], (err, rows, fields) => {
//         if (err) {
//             console.log('Failed to query for words');
//             response.sendStatus(500);
//             response.end();
//         }
//         console.log("I think we  fetched words successfully");

//         response.json(rows);
//     })

// })

// let sess;
// app.get("/", (request, response) => {
//     sess=request.session;
//     response.send("I AM ROOT!");
//     sess.userLoggedIn;
// })

// app.get("/words", (request, response) => {
//     sess=request.session;
//     console.log(sess) 

//     let user;
//     if(typeof sess.user !== undefined) {
//         user = '5';
//     }
//     console.log(user);
//     const connection = mysql.createConnection({
//         host: 'localhost',
//         user: 'root',
//         database: 'langapp'
//     })

//     connection.query("SELECT * FROM user_words WHERE user = " + user + " ORDER BY RAND() LIMIT 1", (err, rows, fields) => {
//         if (err) {
//             console.log('Failed to query for words');
//             response.sendStatus(500);
//             response.end();
//         }
//         console.log("I think we fetched words successfully");

//         response.json(rows);
//     })
// })

// app.listen(3002, () => {
//     console.log('Server is up')
// })
