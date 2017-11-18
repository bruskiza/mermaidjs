let path = null

var config = {
        startOnLoad:true,
        flowchart:{
            useMaxWidth:false,
            htmlLabels:true
        }
    }


setInterval(() => {
  if (path !== window.location.pathname) {
    path = window.location.pathname
    document.querySelectorAll('.lang-mermaid').forEach(node => {
      const newNode = node.cloneNode(true)
      node.removeAttribute('class')
      node.setAttribute("class", "originalDiagram")
      const hr = document.createElement('hr')
      // node.parentNode.insertBefore(hr, node)
      // node.parentNode.insertBefore(newNode, hr)
      node.parentNode.insertBefore(newNode, node)

    })
    window.mermaid.init(config, document.querySelectorAll('.lang-mermaid'))
  }
}, 1000)

function toggleDiagram() {
  
}
