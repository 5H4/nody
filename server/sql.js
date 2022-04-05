var query = (database, query, params = []) => {
    return new Promise((resolve, reject) => {
        database.query(query, params, function(e, r, f){
            if (e) throw e;
            resolve(r)
        })
    })
};

module.exports = {query}