const text1 = document.querySelector('.text1')
const res1 = document.querySelector('.result1')

const text2 = document.querySelector('.text2')
const res2 = document.querySelector('.result2')

const arr = [
    ['а', 'б', 'в', 'г', 'д', 'е'],
    ['ё', 'ж', 'з', 'и', 'й', 'к'],
    ['л', 'м', 'н', 'о', 'п', 'р'],
    ['с', 'т', 'у', 'ф', 'х', 'ц'],
    ['ч', 'ш', 'щ', 'ъ', 'ы', 'ь'],
    ['э', 'ю', 'я'],
]

let result1 = ''

text1.addEventListener('input', e => {
    let word = text1.value
    for (let i = 0; i < word.length; i++) {
        arr.forEach((item, index) => {
            if (item.indexOf(word[i]) !== -1) {
                result1 += index + 1
                result1 += item.indexOf(word[i]) + 1
            }
        })
    }

    res1.innerHTML = result1
    result1 = ''
})

let result2 = ''

text2.addEventListener('input', e => {
    let numbers = text2.value
    for (let i = 0; i < numbers.length; i += 2) {
        arr.forEach((item, index) => {
            if (numbers[i] == index) {
                const correctRow = arr[index - 1]
                if (correctRow[numbers[i]]) {
                    result2 += correctRow[numbers[i] - 1]
                }
            }
        })
    }
    res2.innerHTML = result2
    result2 = ''
})
