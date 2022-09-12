---
extends: _layouts.post
section: content
title: Sender with largest word count
problemUrl: https://leetcode.com/problems/sender-with-largest-word-count/
date: 2022-09-12
categories: [array-and-hashmap]
---

We will create a count each words of the the messages for each sender. Then we take the sender with the highest number of word count, sort them and then return the largest sender name lexicographically.

```python
class Solution:
    def largestWordCount(self, messages: List[str], senders: List[str]) -> str:
        count = collections.Counter()
        for message, sender in zip(messages, senders):
            count[sender] += len(message.split())
        
        maxVal = max(count.values())
        res = []
        for sender, cnt in count.items():
            if cnt == maxVal:
                res.append(sender)
                
        return sorted(res)[-1]
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(n)`