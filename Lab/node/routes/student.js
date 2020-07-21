const express = require('express')
const router = express.Router()
const student = require('../controllers/student.js')
const validator  = require('../middleware/validator.js')
const { validate } = require('../middleware/validator.js')

router.get('/all', validator.allStudents(), validate, student.getAllStudents)
router.get('/view', validator.viewStudent(), validate, student.viewStudent)
router.patch('/update', validator.updateStudent(), validate, student.updateStudent)
router.delete('/delete', validator.deleteStudent(), validate, student.deleteStudent)
router.put('/add', validator.addStudent(), validate, student.addStudent)

module.exports = router