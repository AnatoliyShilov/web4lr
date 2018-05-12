var images, imagesMin, description;
main();
window.onload = function()
{
	createMenu();
	startTime();
	var divF = document.getElementById('galery');
	var content = '<table>';
	for (var i = 0; i < 3; i++)
	{
		content += '<tr>';
		for (var j = i * 5; j < 5 * (i + 1); j++)
			content += 
				'<td class = "foto">' +
				'<img class = "image" src = "' + images[j] +
				'" lowsrc = "' + imagesMin[j] + 
				'" alt = "Это сова" title = "Сова" onclick="showImg('+ j + ')">' +
				'</td>';
		content += '</tr><tr>';
		for (var j = i * 5; j < 5 * (i + 1); j++)
			content +=
				'<td class = "description">' +
				description[j] +
				'</td>';
		content += '</tr>';
	}
	divF.innerHTML += content + '</table>';
};

function showImg(index)
{
	document.getElementById('view').innerHTML = 
	'<img class = "viewFoto" src="' + images[index] + 
	'" lowsrc="' + imagesMin[index] +
	'"alt="Это сова" title="Сова" onclick="hideImg()">';
}

function hideImg()
{
	document.getElementById('view').innerHTML = '';
}

function main() 
{
	var path = 'images/';
	images = new Array
			(
				'owl.jpg',
				'owl1.jpg',
				'owl2.jpg',
				'owl3.jpg',
				'owl4.jpeg',
				'owl5.jpg',
				'owl6.jpeg',
				'owl7.jpeg',
				'owl8.jpeg',
				'owl9.jpg',
				'owl10.jpg',
				'owl11.jpg',
				'owl12.jpg',
				'owl13.jpg',
				'owl14.jpeg'
			);
	imagesMin = new Array
			(
				'owl-min.jpg',
				'owl1-min.jpg',
				'owl2-min.jpg',
				'owl3-min.jpg',
				'owl4-min.jpeg',
				'owl5-min.jpg',
				'owl6-min.jpeg',
				'owl7-min.jpeg',
				'owl8-min.jpeg',
				'owl9-min.jpg',
				'owl10-min.jpg',
				'owl11-min.jpg',
				'owl12-min.jpg',
				'owl13-min.jpg',
				'owl14-min.jpeg'
			);
	description = new Array;
	for (var i = 0; i < images.length; i++)
	{
		images[i] = path + images[i];
		imagesMin[i] = path + imagesMin[i];
		description[i] = 'Рисунок ';
		description[i] += i + 1;
		description[i] += ' - Сова';
	}
}