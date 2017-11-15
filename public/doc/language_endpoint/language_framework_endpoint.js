  var language_framework_endpoint =
  {
    "type": "get",
    "url": "/language/:language/:framework",
    "title": "List frameworks for the particular language",
    "version": "0.1.0",
    "name": "GetFramework",
    "group": "Language",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "language",
            "description": "<p>Language name</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "Name of the language"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "description",
            "description": "<p>Description of the Language.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "summary",
            "description": "<p>Summary of the Language</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "tutorials",
            "description": "<p>List of recommended tutorials of the Language</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"success\",\n\n\"data\":{\n\n\"id\":1,\n\n\"name\":\"php\",\n\n\"description\":\"descriprion\",\n\n\"summary\":\"summary\",\n\n\"tutorials\":[\n\n\"http://\",\n\n\"http://\"\n\n]\n\n}\n\n}\n",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "UserNotFound",
            "description": "<p>The id of the User was not found.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 404 Not Found\n{\n  \"error\": \"UserNotFound\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "./example.js",
    "groupTitle": "Language"
  }

  export language_framework_endpoint;