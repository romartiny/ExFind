(function() {


   /*
      ELEMENTS & VARIABLES
   */
   var formPanel            = document.getElementById('se-form-panel');
   var processingPanel      = document.getElementById('se-processing-panel');
   var resultsPanel         = document.getElementById('se-results-panel');
   var resultsParent        = document.getElementById('se-results-parent');
   var usernameInput        = formPanel.getElementsByTagName('input')['0'];
   var submitButton         = formPanel.getElementsByTagName('button')['0'];
   var processingPercentage = processingPanel.getElementsByTagName('i')['0'];
   var processingUsername   = processingPanel.getElementsByTagName('i')['1'];
   var processingDomain     = processingPanel.getElementsByTagName('i')['2'];
   var resultsUsername      = resultsPanel.getElementsByTagName('i')['0'];
   var resultsUsername2     = resultsPanel.getElementsByTagName('i')['1'];
   var resultsPercentage    = resultsPanel.getElementsByTagName('i')['2'];
   var resetButton          = resultsPanel.getElementsByTagName('button')['0'];
   var urlUsername          = window.location.href.match(/\#([0-9a-z]{1,40})$/i);
   var data                 = JSON.parse(document.getElementById('se-data').innerText);
   var statuses             = data['0'];
   var total                = data['1'];
   var index                = 0;
   var results              = [];
   var username             = null;



   var httpRequest = function(method, url, headers, post, callback) {
      var request = new XMLHttpRequest();
      request.onreadystatechange = function() {
         (this.readyState == 4 && callback(this.responseText));
      };
      request.open(method, url, true);
      for ( var i = 0; i < headers.length; i += 2 ) {
         request.setRequestHeader(headers[i], headers[i + 1]);
      }
      request.send(post);
   };

   var createElement = function(tag, attributes, value) {
      var element       = document.createElement(tag);
      element.innerText = value || '';
      for ( var i = 0; attributes && i < attributes.length; i += 2 ) {
         element.setAttribute(attributes[i], attributes[i + 1]);
      }
      return element;
   };

   var appendChildren = function(element, children) {
      for ( var i = 0; i < children.length; i++ ) {
         element.appendChild(children[i]);
      }
      return element;
   };

   var removeChildren = function(element) {
      while ( element.firstChild ) {
         element.removeChild(element.firstChild);
      }
   };



   var togglePanel = function(panel) {
      if ( panel.className !== 'active' ) {
         formPanel.className       = (panel == formPanel       ? 'active' : '');
         processingPanel.className = (panel == processingPanel ? 'active' : '');
         resultsPanel.className    = (panel == resultsPanel    ? 'active' : '');
      }
   };

   var updateProccessingHtml = function() {
      processingPercentage.innerText = Math.round((index / total) * 100) + '%';
      processingUsername.innerText   = username;
      processingDomain.innerText     = results[results.length - 1].domain;
      togglePanel(processingPanel);
   };

   var updateResultsHtml = function() {
      for ( var i = 0, exists = 0, elements = []; i < results.length; i++ ) {
         exists += (statuses.success.indexOf(results[i].status) >= 0 ? 1 : 0);
         elements.push(appendChildren(createElement('div', ['class', 'col3']), [
            createElement('a', ['href', results[i].url, 'data-value', results[i].message], results[i].url.replace(/(https?\:\/\/)?(www\.)?/i, ''))
         ]));
      }
      resultsUsername.innerText   = username;
      resultsUsername2.innerText  = username;
      resultsPercentage.innerText = Math.round((exists / total) * 100) + '%';
      removeChildren(resultsParent);
      appendChildren(resultsParent, elements);
      togglePanel(resultsPanel);
   };

   var getExistence = function() {
      httpRequest('POST', 'existence.php', ['content-type', 'application/x-www-form-urlencoded'], 'index=' + index + '&username=' + username, function(data) {
         if ( index < total ) {
            ++index;
            results.push(JSON.parse(data));
            updateProccessingHtml();
            getExistence();
         }
         else {
            updateResultsHtml();
         }
      });
   };



   usernameInput.onchange = function() {
      this.value = this.value.replace(/[^a-z0-9]+/ig, '').slice(0, 40);
   };

   submitButton.onclick = function() {
      index    = 0;
      results  = [];
      username = usernameInput.value;
      if ( username.length > 0 ) {
         window.location.href   = '//' + window.location.host + window.location.pathname + '#' + username;
         usernameInput.disabled = true;
         submitButton.disabled  = true;
         getExistence();
      }
   };

   resetButton.onclick = function() {
      usernameInput.disabled = false;
      submitButton.disabled  = false;
      togglePanel(formPanel);
   };


   window.onload = function() {
      if ( urlUsername ) {
         usernameInput.value = urlUsername['1'];
         submitButton.onclick();
      }
      else {
         resetButton.onclick();
      }
   };


})();