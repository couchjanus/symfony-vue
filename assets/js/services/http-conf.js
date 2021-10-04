// Config Defaults
// You can specify config defaults that will be applied to every request.
// Global axios defaults

import axios from "axios";

export default axios.create({
  baseURL: "http://localhost/api",
  headers: {
    "Content-type": "application/json"
  }
});
