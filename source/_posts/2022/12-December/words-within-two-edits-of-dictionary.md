---
extends: _layouts.post
section: content
title: Words within two edits of dictionary
problemUrl: https://leetcode.com/problems/words-within-two-edits-of-dictionary/
date: 2022-12-07
categories: [array-and-hashmap]
---

We will take the brute force approach to solve this problem. For every query, we will go through the dictionary and check if the word is within two edits of the query.

```python
class Solution:
    def twoEditWords(self, queries: List[str], dictionary: List[str]) -> List[str]:
        res = []
        for query in queries:
            for word in dictionary:
                count = 0
                for i in range(len(query)):
                    if query[i] != word[i]:
                        count += 1
                if count<=2:
                    res.append(query)
                    break
        return res
```

Time complexity: `O(n^2)` <br/>
Space complexity: `O(1)`