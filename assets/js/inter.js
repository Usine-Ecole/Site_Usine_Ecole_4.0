// Apprentissgage
const barCanvasInter = document.getElementById("barCanvasInter");

let travailequipe = document.getElementById("travailequipe").innerHTML;
let collectif = document.getElementById("collectif").innerHTML;
let coordination = document.getElementById("coordination").innerHTML;
let conflit = document.getElementById("conflit").innerHTML;
let fiabilite = document.getElementById("fiabilite").innerHTML;
let flexibilite = document.getElementById("flexibilite").innerHTML;
let respect = document.getElementById("respect").innerHTML;
let assertivite = document.getElementById("assertivite").innerHTML;
let feedback = document.getElementById("feedback").innerHTML;
let politesse = document.getElementById("politesse").innerHTML;


const showPopupInter = (label) => {
    const modalBody = document.getElementById("modalBodyInter");
    const modalLabel = document.getElementById("modalLabelInter");
  
    modalLabel.textContent = label;
  
    // Récupérer la valeur correspondante au label
    const value = getValueFromLabelInter(label);
  
    // Vérifier les conditions et mettre à jour la valeur en conséquence
    let popupValue = "";
    if (parseInt(value) === 20) {
      popupValue = "Besoin d'aide: 20%";
    } else if (parseInt(value) === 40) {
      popupValue = "Compliqué pour moi: 40%";
    } else if (parseInt(value) === 70) {
      popupValue = "En cours d'acquisition: 70%";
    } else if (parseInt(value) === 100) {
      popupValue = "Acquis: 100%";
    }
  
    // Afficher le label et la valeur mise à jour dans le corps de la modal
    modalBody.innerHTML = `<h3>${label}</h3><hr><p>${popupValue}</p>`;
  
    // Afficher la modale
    const modalElement = document.getElementById("mdlDetailInter");
    const modal = new bootstrap.Modal(modalElement);
    modal.show();
  };
  
  const getLabelIndexInter = (x, y, pointLabels) => {
    let index = -1;
  
    for (let i = 0; i < pointLabels.length; i++) {
      const { top, right, bottom, left } = pointLabels[i];
  
      if (x >= left && x <= right && y >= top && y <= bottom) {
        index = i;
        break;
      }
    }
    return index;
  };
  


const barChartInter = new Chart(barCanvasInter, {
    type: "radar",
    data: {
        labels: [
            "Travail en équipe",
            "Sens du collectif",
            "Coordination",
            "Gestion de conflit",
            "Fiabilité",
            "Flexibilité et adaptabilité",
            "Respect",
            "Assertivité",
            "Acceptation du feedback",
            "Politesse",

        ],

        datasets: [
            {
                label: "Compétences interpersonnelles",
                data: [travailequipe, collectif, coordination, conflit, fiabilite, flexibilite , respect, assertivite, feedback, politesse],
                fill: true,
                backgroundColor: 'rgba(254,216,177, 0.5)',
                borderColor: 'rgb(240,147,43)',
                pointBackgroundColor: 'rgb(240,147,43)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(240,147,43)'
            },
        ],
    },
    options: {
        scale: {
            r: {
                beginAtZero: true,
                min: 0,
                max: 100,
                stepSize: 20
            },
        },
        onHover: ({ x, y }, _activeHover, chart) => {
            const { canvas } = chart;
            let index = getLabelIndexInter(x, y, chart.scales.r._pointLabelItems);
            if (index === -1) {
              canvas.style.cursor = "default";
            } else {
              canvas.style.cursor = "pointer";
            }
          },
          onClick: ({ x, y }, _activeClick, chart) => {
            let index = getLabelIndexInter(x, y, chart.scales.r._pointLabelItems);
            if (index === -1) {
              return;
            }
            const selectedLabel = chart.data.labels[index];
            showPopupInter(selectedLabel);
          },
    },
});


const getValueFromLabelInter = (label) => {
    // Remplacez cette fonction par la logique appropriée pour récupérer la valeur du label depuis vos données
    // Ici, on utilise un simple tableau pour mapper les labels aux valeurs correspondantes
    const labelValueMap = {
        "Travail en équipe": travailequipe,
        "Sens du collectif": collectif,
        "Coordination": coordination,
        "Gestion de conflit": conflit,
        "Fiabilité": fiabilite,
        "Flexibilité et adaptabilité": flexibilite,
        "Respect": respect,
        "Assertivité": assertivite,
        "Acceptation du feedback": feedback,
        "Politesse": politesse,
              
    };
  
    return labelValueMap[label] || "";
  };
  
