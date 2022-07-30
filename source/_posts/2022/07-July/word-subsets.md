---
extends: _layouts.post
section: content
title: Word subsets
problemUrl: https://leetcode.com/problems/word-subsets/
date: 2022-07-30
categories: [array-and-hashmap]
---

First we count all the characters in our search array and combine it to a hashmap containing all the characters count. Then we iterate through each word in our input word list, count all the characters and then compare if we have every characters count from our search array. If yes, we append it to a result. Then we return it after the iteration is done.

```python
class Solution:
    def wordSubsets(self, words1: List[str], words2: List[str]) -> List[str]:
        count = collections.Counter()
        
        for word in words2:
            count |= collections.Counter(word)
        
        res = []
        for word in words1:
            if count <= collections.Counter(word):
                res.append(word)
        
        return res
```

Time Complexity: `O(n*m)`, n is number of words in words1, m is number of words in words2. <br/>
Space Complexity: `O(n+m)`