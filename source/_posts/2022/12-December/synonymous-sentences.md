---
extends: _layouts.post
section: content
title: Synonymous sentences
problemUrl: https://leetcode.com/problems/synonymous-sentences/
date: 2022-12-27
categories: [graph]
---

We will create a graph where the nodes are the words and the edges are the synonyms. Then we will do a DFS to find all the possible sentences and add that to a hashset to remove duplicates. Finally, we will sort the sentences and return them.

```python
class Solution:
    def generateSentences(self, synonyms: List[List[str]], text: str) -> List[str]:
        graph = collections.defaultdict(list)
        for key, val in synonyms:
            graph[key].append(val)
            graph[val].append(key)
        
        res = set()
        stack = [text]
        while stack:
            sentence = stack.pop()
            res.add(sentence)
            
            words = sentence.split()
            for i in range(len(words)):
                if words[i] in graph:
                    for rw in graph[words[i]]:
                        newSentence = " ".join(words[:i] + [rw] + words[i+1:])
                        if newSentence not in res:
                            stack.append(newSentence)
        
        return sorted(list(res))
```

Time complexity: `O(n^2)` <br/>
Space complexity: `O(n^2)`
