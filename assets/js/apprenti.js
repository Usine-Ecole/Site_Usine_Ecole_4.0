const barCanvasApp = document.getElementById("barCanvasApp");

let volonte = document.getElementById("volonte").innerHTML;
let apprendre = document.getElementById("apprendre").innerHTML;
let evaluation = document.getElementById("evaluation").innerHTML;
let controle = document.getElementById("controle").innerHTML;
let auto = document.getElementById("auto").innerHTML;
let esprit = document.getElementById("esprit").innerHTML;
let curiosite = document.getElementById("curiosite").innerHTML;
let methodologie = document.getElementById("methodologie").innerHTML;

const showPopup = (label) => {
  const modalBody = document.getElementById("modalBodyAppren1");
  const modalLabel = document.getElementById("modalLabelAppren1");

  modalLabel.textContent = label;

  // Récupérer la valeur correspondante au label
  const value = getValueFromLabelApp(label);

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
  const modalElement = document.getElementById("mdlDetailAppren1");
  const modal = new bootstrap.Modal(modalElement);
  modal.show();
};

const getLabelIndex = (x, y, pointLabels) => {
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

const barChartApp = new Chart(barCanvasApp, {
  type: "radar",
  data: {
    labels: [
      "Volonté d'apprendre",
      "Apprendre à apprendre",
      "Auto-évaluation",
      "Contrôle de qualité",
      "Autonomie",
      "Esprit d'entreprendre",
      "Curiosité",
      "Compétence méthodologique",
    ],
    datasets: [
      {
        label: "Apprentissages",
        data: [
          volonte,
          apprendre,
          evaluation,
          controle,
          auto,
          esprit,
          curiosite,
          methodologie,
        ],
        fill: true,
        backgroundColor: "rgba(255, 99, 132, 0.2)",
        borderColor: "rgb(255, 99, 132)",
        pointBackgroundColor: "rgb(255, 99, 132)",
        pointBorderColor: "#fff",
        pointHoverBackgroundColor: "#fff",
        pointHoverBorderColor: "rgb(255, 99, 132)",
      },
    ],
  },
  options: {
    scale: {
      r: {
        beginAtZero: true,
        min: 0,
        max: 100,
        stepSize: 20,
      },
    },
    onHover: ({ x, y }, _activeHover, chart) => {
      const { canvas } = chart;
      let index = getLabelIndex(x, y, chart.scales.r._pointLabelItems);
      if (index === -1) {
        canvas.style.cursor = "default";
      } else {
        canvas.style.cursor = "pointer";
      }
    },
    onClick: ({ x, y }, _activeClick, chart) => {
      let index = getLabelIndex(x, y, chart.scales.r._pointLabelItems);
      if (index === -1) {
        return;
      }
      const selectedLabel = chart.data.labels[index];
      showPopup(selectedLabel);
    },
  },
});

const getValueFromLabelApp = (label) => {
  // Remplacez cette fonction par la logique appropriée pour récupérer la valeur du label depuis vos données
  // Ici, on utilise un simple tableau pour mapper les labels aux valeurs correspondantes
  const labelValueMap = {
    "Volonté d'apprendre": volonte,
    "Apprendre à apprendre": apprendre,
    "Auto-évaluation": evaluation,
    "Contrôle de qualité": controle,
    "Autonomie": auto,
    "Esprit d'entreprendre": esprit,
    "Curiosité": curiosite,
    "Compétence méthodologique": methodologie,
  };

  return labelValueMap[label] || "";
};