---
extends: _layouts.post
section: content
title: Find duplicate file in system
problemUrl: https://leetcode.com/problems/find-duplicate-file-in-system/
date: 2022-09-19
categories: [array-and-hashmap]
---

We will iterate over each path, extract the content, and based on the content, we will attach it to a hashmap where the key will be the content. Then we filter out the single files and return the rest as result.

```python
class Solution:
    def findDuplicate(self, paths: List[str]) -> List[List[str]]:
        fileName = collections.defaultdict(list)
        result = []
        
        for path in paths:
            filePath = path.split()
            for idx in range(1, len(filePath)):
                i = filePath[idx].index('(')
                word = filePath[idx][i:]
                value = filePath[0] + '/' + filePath[idx][:i]
                fileName[word].append(value)
        
        for key, value in fileName.items():
            if len(fileName[key]) > 1: 
                result.append(value)
        
        return result
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`