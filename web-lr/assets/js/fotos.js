var images, imagesMin, description;
var currentImgIndex, maxImgIndex;
main();
$(document).ready(function()
{
	createMenu();
	startTime();
});

function showImg(index)
{
	$('#view').html(listGalery(index));
}

function hideImg()
{
	$('#view').html('');
}

function main() 
{
	var path = 'assets/img/';
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
	maxImgIndex = images.length - 1;
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

function listGalery(index)
{
	currentImgIndex = index;
	var content = 
		'<div id = "controlPanel" style = "position: relative; display: block; text-align: center">' +
			'<div class = "rama background" style = "display: inline">' +
				'<div id = "leftArrow" style = "position: relative; display: inline"><img src = "assets/img/leftArrow.jpg" onclick = "prevImg()"></div>' +
				'<div id = "indexOf" style = "position: relative; display: inline"> ' + (index + 1) + ' из 15</div>' +
				'<div id = "rightArrow" style = "position: relative; display: inline"><img src = "assets/img/rightArrow.jpg" onclick = "nextImg()"></div>' +
			'</div>'+
		'</div>' +
		'<div id = "lineGalery" style = "height: 465px; position: relative; display: block"><img class = "lineFoto" src = "' + images[index] + '" lowsrc = "' + imagesMin[index] + 
		'" alt = "Это сова" title = "Сова" onclick = "hideImg()"></div>';
	return content;
}

function showImgOnIndex(index)
{
	$('#lineGalery').html(
		'<img class = "lineFoto" src = "' + images[index] + '"' +
		'lowsrc = "' + imagesMin[index] + '"' +
		'alt = "Это сова"' +
		'title = "Сова"' +
		'onclick = "hideImg()">'
	);
	$('#indexOf').html((index + 1) + ' из ' + (maxImgIndex + 1));
}

function nextImg()
{
	currentImgIndex++;
	if (currentImgIndex > maxImgIndex)
		currentImgIndex = 0;
	$('#lineGalery')
		.animate({left: '-=200px'}, 500)
		.hide(100, function()
		{
			showImgOnIndex(currentImgIndex);
		})
		.animate({left: '+=400px'}, 0)
		.show(100)
		.animate({left: '-=200px'}, 500);
}

function prevImg()
{
	currentImgIndex--;
	if (currentImgIndex < 0)
		currentImgIndex = maxImgIndex;
	$('#lineGalery')
		.animate({left: '+=200px'}, 500)
		.hide(100, function()
		{
			showImgOnIndex(currentImgIndex);
		})
		.animate({left: '-=400px'}, 0)
		.show(100)
		.animate({left: '+=200px'}, 500);
}

function tableGalery()
{
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
	return content + '</table>';
}