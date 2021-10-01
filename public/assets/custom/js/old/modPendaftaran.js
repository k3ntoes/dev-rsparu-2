document.onreadystatechange = () => {
    console.log(document.readyState)
    if (document.readyState === 'complete') console.log("finish him")
}