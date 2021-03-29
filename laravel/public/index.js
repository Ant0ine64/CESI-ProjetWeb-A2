if ("serviceWorker" in navigator){
    navigator.serviceWorker.register("service-worker.js").then(registration => {
        console.log("SW registered!");
        console.log(registration);
    }).catch(error =>{
        console.log('SW registration failed!');
        console.log(error);
    });
}