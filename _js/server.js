const express = require('express');
const fs = require('fs');
const path = require('path');
const app = express();

app.get('/list-files', (req, res) => {
    const directoryPath = 'D:/look_no_paper/zr/drg/assembly/UKMAM000080/Assembly';
    fs.readdir(directoryPath, (err, files) => {
        if (err) {
            return res.status(500).send('Unable to scan directory: ' + err);
        }
        const fileList = files.map(file => ({
            name: file,
            url: `http://UKDEEMFIIxxxx/look_no_paper/zr/drg/assembly/UKMAM000080/Assembly/${file}`
        }));
        res.json(fileList);
    });
});

app.listen(3000, () => {
    console.log('Server started on http://localhost:3000');
});