---
extends: _layouts.post
section: content
title: Shortest word distance
problemUrl: https://leetcode.com/problems/shortest-word-distance/
date: 2022-11-28
categories: [array-and-hashmap]
---

We will keep track of both words' last seen index. Then we will iterate through the `words` array and update the result if we find either of the words. Finally, we will return the result.

```python
class Solution:
    def shortestDistance(self, wordsDict: List[str], word1: str, word2: str) -> int:
        i1, i2 = -1, -1
        minDistance = len(wordsDict)
        
        for i, word in enumerate(wordsDict):
            if word == word1:
                i1 = i
            elif word == word2:
                i2 = i
            
            if i1 != -1 and i2 != -1:
                minDistance = min(minDistance, abs(i1-i2))
        
        return minDistance
```

Time complexity: `O(n)`, n is the number of words in the `wordsDict` <br/>
Space complexity: `O(1)`