//memanggil package
const express = require('express')
//memanggil file buatan sendiri
const bookRouter = require('./routes/book-route')
const authorRouter = require('./routes/author-route')
const authRouter = require('./routes/auth-router')
const jwt = require('jsonwebtoken')
const accessTokenSecret = '2023-wikrama-exp'
const cors = require('cors')

//menjalankan framework express
const app = express()
//memberitahu kalau project express ini ketika ngirim data, hanya bisa menggunakan format json 
app.use(express.json())
//mengubah req dari url menjadi tipe format json, dan baca karakter khusus sebagai string 
app.use(
    express.urlencoded({
        extended: true,
    })
)

app.use(cors())

const authenticateJWT = (req, res, next) => {
    const authHeader = req.headers.authorization

    if (!authHeader) {
        return res.status(403).json({message: 'Unauthorized'})
    }

    const token = authHeader.split(' ')[1]

    jwt.verify(token, accessTokenSecret, (err, user) => {
        if (err){
            return res.status(403).json({message: 'Unauthorized'})
        }
        next()
    })
}


const PORT = 3000

//rooting

app.use('/auth', authRouter)
app.use('/book', bookRouter)
app.use('/author', authorRouter)
app.use('/book/:id/:bookname/:year', (req, res) => {
    res.send(req.params)
})
app.get('/filter', (req, res) => {
    res.send(req.query)
})


// app.get('/', (req, res) => res.send('Hello world!'))
// app.get('/wikrama', (req, res) => res.send('Hello wikrama!'))
// app.get('/about', (req, res) => res.send('Hello ini adalah halaman about!'))


//menjalankan di port apa yang mana 
app.listen(PORT, () =>
 console.log(`server ini berjalan di http://localhost:${PORT}`)
)