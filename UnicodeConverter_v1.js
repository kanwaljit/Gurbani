﻿function convert()
{
	//var panFontTxt = document.getElementById("txtPanFont").value;
	var panFontTxt = document.getElementById("txtPanFont").innerHTML;
	//var panFontTxt = rawText;
	var uniFontTxtArea = document.getElementById("txtUniFont");
	//uniFontTxtArea.value = "";
	uniFontTxtArea.innerHTML = "";
	
	//var lineNumToConvert = parseInt(document.getElementById("selctLineNum").value);
	var lineNumToConvert = lineNumToConvert=1;
	//var conversionType = parseInt(document.getElementById("conversionType").value);
	var conversionType = conversionType=1;
	
	//var panFontTxt_NewLineSplitarray = panFontTxt.replace("Ø","").replace(">","").split("\n");
	var panFontTxt_NewLineSplitarray = panFontTxt.replace("Ø","").replace(">","").split("\n");
	var convertedText = "";
	
	var nextLineToConvert = 1;
	
	for (var i = 0;i<panFontTxt_NewLineSplitarray.length;i++)
	{
		if(nextLineToConvert == (i + 1))
		{
			var panFontTxt_charArray = removeUnwantedChars(panFontTxt_NewLineSplitarray[i]).split("");
			
			for(var j = 0; j < panFontTxt_charArray.length; j++)
			{
				var currentChar = panFontTxt_charArray[j];
                var nextChar = panFontTxt_charArray[j+1];
                var nextNextChar = panFontTxt_charArray[j+2];

				if(conversionType == 2)
				{
					if(currentChar == ' ')
					{
						continue;
					}
				}
				
			 	if(currentChar == 'i')
				{
					if(nextChar != null)
					{
						if(nextChar == 'e')
						{
							convertedText += 'ਇ';
						}
                        else if(nextNextChar == 'R' || nextNextChar == 'H' ||  
                                nextNextChar == 'Í' || nextNextChar == 'ç' ||
                                nextNextChar == '†' || nextNextChar == 'œ' ||
                                nextNextChar == '~' || nextNextChar == '®')
                        {
								convertedText += convertText(nextChar);
                                convertedText += convertText(nextNextChar);
                                convertedText += 'ਿ';
                                j = j + 1;
                        }
						else
						{
							convertedText += convertText(nextChar);
							convertedText += 'ਿ';
						}
						j = j + 1;
					}
					else
					{
						convertedText += convertText(currentChar);
					}
				}
				else if(currentChar == 'a')
				{
					switch (nextChar)
					{
						case 'u':
						  convertedText += 'ਉ';
						  j = j + 1;
						  break;
						case 'U':
						  convertedText += 'ਊ';
						  j = j + 1;
						  break;
						default:
						  convertedText += convertText(currentChar);
					}
				}
				else if(currentChar == 'A')
				{
					switch (nextChar)
					{
						case 'w':
						  convertedText += 'ਆ';
						  j = j + 1;
						  break;
					    case 'W':
						  convertedText += 'ਆਂ';
						  j = j + 1;
						  break;
						case 'Y':
						  convertedText += 'ਐ';
						  j = j + 1;
						  break;
						case 'O':
						  convertedText += 'ਔ';
						  j = j + 1;
						  break;
						default:
						  convertedText += convertText(currentChar);
					}
				}
				else if(currentChar == 'e')
				{
					switch (nextChar)
					{
						case 'I':
						  convertedText += 'ਈ';
						  j = j + 1;
						  break;
						case 'y':
						  convertedText += 'ਏ';
						  j = j + 1;
						  break;
						default:
						  convertedText += convertText(currentChar);
					}
				}
				else if(currentChar == 'u' && nextChar == 'o')
                {
					convertedText += 'ੋੁ';
                    j = j + 1;
                }
				else if((currentChar == '@' && nextChar == 'Y') || (currentChar == '@' && nextChar == 'y') || (currentChar == '@' && nextChar == 'o') || (currentChar == '@' && nextChar == 'O'))
                {
					convertedText += convertText(nextChar);
                    convertedText += '੍';
                    j = j + 1;
                }
                else if(currentChar == '@' && nextChar == 'w')
                {
                    convertedText += '੍ਹ';
                    convertedText += convertText(nextChar);
                    j = j + 1;
                }
                else if((currentChar == 'N' && nextChar == 'I') || (currentChar == 'M' && (nextChar == 'U' || nextChar == 'u' || nextChar=='ü')) || (currentChar == 'ˆ' && nextChar == 'I') || (currentChar == 'N' && nextChar == 'y') )
                {
                    convertedText += convertText(nextChar);
                    convertedText += convertText(currentChar);
                    j = j + 1;
                }
				else
				{
					convertedText += convertText(currentChar);
				}
			}	
			
			if(i != panFontTxt_NewLineSplitarray.length - 1)
			{
				nextLineToConvert = nextLineToConvert + lineNumToConvert;				
			}
		}
		else
		{
			convertedText += panFontTxt_NewLineSplitarray[i];
		}
		
		if(i != panFontTxt_NewLineSplitarray.length - 1)
		{
			convertedText += "\n";
			//convertedText += "<br/>";
		}
	}
	
	//uniFontTxtArea.value = convertedText;
	uniFontTxtArea.innerHTML = convertedText;
	//return convertedText;
}

function convertText(charToConvert){ 
	 switch (charToConvert)
	{
		case 'a':
			    return 'ੳ';
		        break;
		case 'A':
		      return 'ਅ';
		      break;
		case 's':
		      return 'ਸ';
		      break;
		case 'S':
		      return 'ਸ਼';
		      break;
		case 'd':
		      return 'ਦ';
		      break;
		case 'D':
		      return 'ਧ';
		      break;
		case 'f':
		      return 'ਡ';
		      break;
		case 'F':
		      return 'ਢ';
		      break;
		case 'g':
		      return 'ਗ';
		      break;
		case 'G':
		      return 'ਘ';
		      break;
		case 'h':
		      return 'ਹ';
		      break;
		case 'H':
		      return '੍ਹ';
		      break;
		case 'j':
		      return 'ਜ';
		      break;
		case 'J':
		      return 'ਝ';
		      break;
		case 'k':
		      return 'ਕ';
		      break;
		case 'K':
		      return 'ਖ';
		      break;
		case 'l':
		      return 'ਲ';
		      break;
		case 'L':
		      return 'ਲ਼';
		      break;
		case 'q':
		      return 'ਤ';
		      break;
		case 'Q':
		      return 'ਥ';
		      break;
		case 'w':
		      return 'ਾ';
		      break;
		case 'W':
		      return 'ਾਂ';
		      break;
		case 'e':
		      return 'ੲ';
		      break;
		case 'E':
		      return 'ਓ';
		      break;
		case 'r':
		      return 'ਰ';
		      break;
		case 'R':
        case '®':
		      return '੍ਰ';
		      break;
		case 't':
		      return 'ਟ';
		      break;
		case 'T':
		      return 'ਠ';
		      break;
		case 'y':
		      return 'ੇ';
		      break;
		case 'Y':
		      return 'ੈ';
		      break;
		case 'u':
		case 'ü':
		      return 'ੁ';
		      break;
		case 'U':
		      return 'ੂ';
		      break;
		case 'i':
		      return 'ਿ';
		      break;
		case 'I':
		      return 'ੀ';
		      break;
		case 'o':
		      return 'ੋ';
		      break;
		case 'O':
		      return 'ੌ';
		      break;
		case 'p':
		      return 'ਪ';
		      break;
		case 'P':
		      return 'ਫ';
		      break;
		case 'z':
		      return 'ਜ਼';
		      break;
		case 'z':
		      return 'ਗ਼';
		      break;
		case 'Z':
		      return 'ਗ਼';
		      break;
		case 'x':
		      return 'ਣ';
		      break;
		case 'X':
		      return 'ਯ';
		      break;
		case 'c':
		      return 'ਚ';
		      break;
		case 'C':
		      return 'ਛ';
		      break;
		case 'v':
		      return 'ਵ';
		      break;
		case 'V':
		      return 'ੜ';
		      break;
		case 'b':
		      return 'ਬ';
		      break;
		case 'B':
		      return 'ਭ';
		      break;
		case 'n':
		      return 'ਨ';
		      break;
		case 'N':
		case 'ˆ':
		      return 'ਂ';
		      break;
		case 'm':
		      return 'ਮ';
		      break;
		case 'M':
        case 'µ':
		      return 'ੰ';
		      break;
		case '`':
		      return 'ੱ';
		      break;
        case 'Í':
              return '੍ਵ'
              break;
        case 'ç':
              return '੍ਚ'
              break;
        case '†':
              return '੍ਟ'
              break;
        case 'œ':
              return '੍ਤ'
              break;
        case '~':
              return '੍ਨ'
              break;
        case '´':
              return '੍ਯ'
              break;
		case '1':
		      return '੧';
		      break;
		case '2':
		      return '੨';
		      break;
		case '3':
		      return '੩';
		      break;
		case '4':
		      return '੪';
		      break;
		case '5':
		      return '੫';
		      break;
		case '6':
		      return '੬';
		      break;
		case '^':
		      return 'ਖ਼';
		      break;
		case '7':
		      return '੭';
		      break;
		case '&':
		      return 'ਫ਼';
		      break;
		case '8':
		      return '੮';
		      break;
		case '9':
		      return '੯';
		      break;
		case '0':
		      return '੦';
		      break;
		case '\\':
		      return 'ਞ';
		      break;
		case '|':
		      return 'ਙ';
		      break;
		case ']':
		      return '||';
		      break;
		case '<':
		      return 'ੴ';
		      break;
		case 'Ú':
		      return 'ਃ';
		      break;
        case '@':
		      return '੍ਹ';
		      break;
		default:
		  return charToConvert;
	}
} 

function removeUnwantedChars(str){ 
    str = str.replace(/>/gi, "");
    str = str.replace(/Ø/gi, "");
    return str;
}