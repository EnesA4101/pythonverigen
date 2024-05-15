from flask import Flask, jsonify,request
from flask_cors import CORS
import valid

app = Flask(__name__)
CORS(app)
@app.route("/api")
def home():
    key = request.args.get('key')
    token = request.args.get('token')
    return jsonify(valid.get(key,token))

if __name__ == "__main__":
    app.run(host="0.0.0.0", port=8000, debug=True)