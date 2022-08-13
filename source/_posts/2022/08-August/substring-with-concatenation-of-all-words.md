---
extends: _layouts.post
section: content
title: Substring with concatenation of all words
problemUrl: https://leetcode.com/problems/substring-with-concatenation-of-all-words/
date: 2022-08-13
categories: [sliding-window]
---

We will create a haspmap with all the words count from the list, then we will start a sliding window, and checking the word is present in the string, then move forward by the length of each word.

```python
class Solution:
    def findSubstring(self, s: str, words: List[str]) -> List[int]:
        wordsLen = len(words)
        wordLen = len(words[0])
        res = []
        
        for i in range(wordLen):
            left = i
            count = collections.Counter(words)
            for j in range(left, len(s)+1-wordLen, wordLen):
                word = s[j:j+wordLen]
                count[word] -= 1
                
                while count[word] < 0:
                    count[s[left:left+wordLen]] += 1
                    left += wordLen
                if left + wordLen*wordsLen == j + wordLen:
                    res.append(left)
        
        return res
```

Time Complexity: `O(n*w)`, n is the number of words and w is the length of each word <br/>
Space Complexity: `O(n*w)`