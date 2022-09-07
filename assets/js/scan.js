// Import packages.
const bx = require("barcode-js");

// Set up logging function.
const logResults = (results) => console.log(JSON.stringify(results, ["type", "value", "confidence"], 2));

// Set up analysis function.
const analyzeBarcodes = async (filePath) => {
    try {
        const results = await bx.analyze(filePath);
        logResults(results);
    }
    catch(err) {
        console.error(`Fatal: Error analyzing image input\n${err}`);
    }
};

// Set up parameters.
// Accepted file types are bmp, tiff, jpg, gif, png, and url
const filePath = "test.bmp";

// Call analyze.
analyzeBarcodes(filePath);

const barcodeValue = result.confidence;