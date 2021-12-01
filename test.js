document.getElementById('x').addEventListener('click',() =>{
    getRbd();
})

const getRbd = () =>{
    const rbd = fetch('url')
        .then((response) => response.json())
        .then((response) => response)
    return rbd;
}

document.getElementById('rbd').addEventListener('change', ()=>{
    
});