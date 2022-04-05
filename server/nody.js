var SQL = require('./sql');

module.exports = {
    insert : async function(db, req){
        // Check if query text
        if(!req.query.text) return {error: 'No text'};

        const text = req.query.text;

        // Vlidation text.
        if (text.length > 300) {
            return {
                error: 'Text is too long.'
            }
        }
        if (text.length < 5) {
            return {
                error: 'Text is too short.'
            }
        }

        const insertNody = `INSERT INTO nodies (text) VALUES (?)`;
        const insert = SQL.query(db, insertNody, [text]);

        if(insert){
            return {
                success: 'Inserted'
            }
        } else {
            return {
                error: 'Error'
            }
        }
    },
    list : async function(db){

        const listNody = `SELECT * FROM nodies ORDER BY nody_like DESC`;
        const list = SQL.query(db, listNody);

        return list;

    },
    like : async function(db, req){
            
        // Check if query id
        if(!req.query.id) return {error: 'No id'};
    
        const id = req.query.id;
    
        const likeNody = `UPDATE nodies SET nody_like = nody_like + 1 WHERE id = ?`;
        const like = SQL.query(db, likeNody, [id]);
    
        if(like){
            return {
                success: 'Liked'
            }
        } else {
            return {
                error: 'Error'
            }
        }
    },
    dislike : async function(db, req){
                
        // Check if query id
        if(!req.query.id) return {error: 'No id'};
        
        const id = req.query.id;
        
        const dislikeNody = `UPDATE nodies SET nody_dislike = nody_dislike + 1 WHERE id = ?`;
        const dislike = SQL.query(db, dislikeNody, [id]);
        
        if(dislike){
            return {
                success: 'Disliked'
            }
        } else {
            return {
                error: 'Error'
            }
        }
    }
}