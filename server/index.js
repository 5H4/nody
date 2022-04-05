/***
 * v0.1.0
 * Nody
 * Insert new nody. V
 * List all nody. V
 * Like nody. V
 * Dislike nody. V
 */

/**
 * Client side boostrap.
 * Server side nodejs.
 * - Databse:(mysql)
 * - - table: nodies
 * - - - id
 * - - - text (max 300 chars)
 * - - - nody_like (int)
 * - - - nody_dislike (int)
 */

const express = require('express');
const db = require('./db');
const nody = require('./nody');
const cors = require('cors');

const app = express();
app.use(cors());

app.listen(3000, () => {
    console.log('Server is running on port 3000');
});


/**Rest API */

//Insert new nody
app.post('/api/nody/insert', async (req, res) => {
    const insert = await nody.insert(db, req);
    res.json(insert);
});

//List all nody
app.get('/api/nody/list', async (req, res) => {
    const list = await nody.list(db);
    res.json(list);
});

// Like nody
app.post('/api/nody/like', async (req, res) => {
    const like = await nody.like(db, req);
    res.json(like);
}
);

// Dislike nody
app.post('/api/nody/dislike', async (req, res) => {
    const dislike = await nody.dislike(db, req);
    res.json(dislike);
});



