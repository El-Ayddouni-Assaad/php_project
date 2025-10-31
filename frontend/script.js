async function getBackendMessage() {
  try {
    const response = await fetch('http://localhost:8080'); // backend PHP exposé sur port 8080
    const data = await response.text(); // le backend renvoie du texte
    document.getElementById('result').innerHTML = data;
  } catch (error) {
    console.error('Erreur lors de la connexion au backend :', error);
    document.getElementById('result').innerHTML = 'Erreur de connexion au backend.';
  }
}

// Exécute la requête au chargement de la page
window.onload = getBackendMessage;