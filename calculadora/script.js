// Variables para la calculadora
let currentInput = '';
let operator = '';
let previousInput = '';

// Funciones de la calculadora
function appendNumber(number) {
  currentInput += number;
  updateDisplay();
}

function setOperator(op) {
  if (currentInput === '') return;
  if (previousInput !== '') calculateResult();
  operator = op;
  previousInput = currentInput;
  currentInput = '';
}

function calculateResult() {
  let result;
  const prev = parseFloat(previousInput);
  const current = parseFloat(currentInput);

  if (isNaN(prev) || isNaN(current)) return;

  switch (operator) {
    case '+': result = prev + current; break;
    case '-': result = prev - current; break;
    case '*': result = prev * current; break;
    case '/': result = prev / current; break;
    default: return;
  }

  currentInput = result.toString();
  operator = '';
  previousInput = '';
  updateDisplay();
}

function clearDisplay() {
  currentInput = '';
  operator = '';
  previousInput = '';
  updateDisplay();
}

function updateDisplay() {
  document.getElementById('display').value = currentInput;
}

// Función del conversor de unidades
function convertUnits() {
  const inputValue = parseFloat(document.getElementById('inputValue').value);
  const fromUnit = document.getElementById('fromUnit').value;
  const toUnit = document.getElementById('toUnit').value;

  if (isNaN(inputValue)) {
    document.getElementById('conversionResult').textContent = 'Por favor, ingresa un número válido.';
    return;
  }

  const conversionFactors = {
    m: { m: 1, km: 0.001, cm: 100, ft: 3.28084, in: 39.3701 },
    km: { m: 1000, km: 1, cm: 100000, ft: 3280.84, in: 39370.1 },
    cm: { m: 0.01, km: 0.00001, cm: 1, ft: 0.0328084, in: 0.393701 },
    ft: { m: 0.3048, km: 0.0003048, cm: 30.48, ft: 1, in: 12 },
    in: { m: 0.0254, km: 0.0000254, cm: 2.54, ft: 0.0833333, in: 1 }
  };

  const result = inputValue * conversionFactors[fromUnit][toUnit];
  document.getElementById('conversionResult').textContent = `${inputValue} ${fromUnit} = ${result.toFixed(2)} ${toUnit}`;
}

// Generar botones dinámicamente
document.addEventListener('DOMContentLoaded', () => {
  const buttonTemplate = document.getElementById('button-template');
  const buttonContainer = document.querySelector('.row.g-2');

  const buttons = [
    ['7', '8', '9', '/'],
    ['4', '5', '6', '*'],
    ['1', '2', '3', '-'],
    ['0', 'C', '=', '+']
  ];

  buttons.forEach(row => {
    row.forEach(btnText => {
      const clone = buttonTemplate.content.cloneNode(true);
      const button = clone.querySelector('button');
      button.textContent = btnText;

      if (['/', '*', '-', '+'].includes(btnText)) {
        button.classList.add('btn-danger');
        button.onclick = () => setOperator(btnText);
      } else if (btnText === 'C') {
        button.classList.add('btn-warning');
        button.onclick = clearDisplay;
      } else if (btnText === '=') {
        button.classList.add('btn-success');
        button.onclick = calculateResult;
      } else {
        button.classList.add('btn-primary');
        button.onclick = () => appendNumber(btnText);
      }

      buttonContainer.appendChild(clone);
    });
  });
});