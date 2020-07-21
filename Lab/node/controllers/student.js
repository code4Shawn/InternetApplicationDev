const connection = require('../database.js')
const moment = require('moment')


module.exports = {

    getAllStudents: (req, res) => {

        connection.query('SELECT * FROM student LIMIT  ?, 5', [req.body.startAt], (error, results) => {
            if (!error) {
                res.json({ code: 200, data: results ? results.length > 0 ? results : [] : [] })
            } else {
                res.json({ code: 500, message: 'Error', info: e.message })
            }

        })

    },
    viewStudent: (req, res) => {
        connection.query('SELECT * FROM student WHERE id = ?',
            [req.body.id, req.body.startAt], (error, results) => {
                if (!error) {
                    res.json({ code: 200, data: results ? results : [] })
                } else {
                    res.json({ code: 500, message: 'Error', info: e.message })
                }
            })
    },

    deleteStudent: (req, res) => {
        connection.query('DELETE FROM student WHERE id = ?',
            [req.body.id], (error, results) => {
                if (!error) {
                    if (results.affectedRows > 0) {
                        res.json({ code: 200, message: 'Ok', info: 'Student record deleted!' })
                    }
                } else {
                    res.json({ code: 500, message: 'Error', info: error.message })
                }

            })
    },

    updateStudent: (req, res) => {
        connection.query('UPDATE student SET first_name = ?, last_name = ?, date_modified = ?, faculty_id = ? WHERE id = ?',
            [req.body.fname, req.body.lname, moment(Date.now()).format('YYYY-MM-DD HH:mm:ss'), req.body.facultyid, req.body.id], (error, results) => {
                if (!error) {
                    if (results.affectedRows > 0) {
                        res.json({ code: 200, message: 'Ok', info: 'Student record updated!' })
                    }
                } else {
                    res.json({ code: 500, message: 'Error', info: error.message })
                }
            })
    },

    addStudent: (req, res) => {
        connection.query('INSERT INTO student (first_name, last_name, date_created, date_modified, faculty_id) VALUES (?,?,?,?,?)',
            [req.body.fname, req.body.lname, moment(Date.now()).format('YYYY-MM-DD HH:mm:ss'), moment(Date.now()).format('YYYY-MM-DD HH:mm:ss'),  req.body.facultyid], (error, results) => {
                if (!error) {
                    if (results.affectedRows > 0) {
                        res.json({ code: 200, message: 'Ok', info: 'Student record added!' })
                    }
                } else {
                    res.json({ code: 500, message: 'Error', info: error.message })
                }
            })
    },
}