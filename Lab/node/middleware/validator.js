const { body, validationResult } = require('express-validator')

const addStudent  = ()=> {
    return [
        body('fname').notEmpty().isString().withMessage('First name required'),
        body('lname').notEmpty().isString().withMessage('Last name required'),
        body('facultyid').notEmpty().isInt().withMessage('Facility id required')
    ]
}


const updateStudent  = ()=> {
    return [
        body('fname').notEmpty().isString().withMessage('First name required'),
        body('lname').notEmpty().isString().withMessage('Last name required'),
        body('facultyid').notEmpty().isInt().withMessage('Facility id required'),
        body('id').notEmpty().isInt().withMessage('Student id required')
    ]

}

const deleteStudent  = ()=> {
    return [
        body('id').notEmpty().isInt().withMessage('Student id required')
    ]

}

const viewStudent  = ()=> {
    return [
        body('id').notEmpty().isInt().withMessage('Student id required')
    ]

}

const allStudents  = ()=> {
    return [
        body('startAt').notEmpty().isInt().withMessage('Student id required')
    ]

}

const returnErrors = (errors) => {
    let yieldedErrors = []
    errors.array().map(err => {
        yieldedErrors.push([err.param] + ':' + err.msg)
    })
    console.log(yieldedErrors)
    return [...new Set(yieldedErrors)]
}



const validate = (req, res, next) => {
    const inputErrors = validationResult(req)
    if (inputErrors.isEmpty()) {
        next()
    } else {
        return res.status(422).json({ errors: returnErrors(inputErrors) })
    }
}

module.exports = {
    validate,
    addStudent,
    updateStudent,
    deleteStudent,
    viewStudent,
    allStudents

}
