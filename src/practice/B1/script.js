/**
 * @type {HTMLCanvasElement}
 */
const canvas = document.querySelector("canvas")

function aaa() {
    canvas.toBlob((brob) => {
        const a = document.createElement("a");
        const newI = document.createElement("img")
        a.href = URL.createObjectURL(brob)
        a.download = "a.png";
        a.click()
    })
}